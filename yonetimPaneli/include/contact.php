<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php
            // Handle form submission
            if ($_POST) {
                // Ensure all required fields are filled
                if (!empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["address"])  && !empty($_POST["fax"])) {
                    $phone = trim($DB->filter($_POST["phone"]));
                    $email = trim($DB->filter($_POST["email"]));
                    $address = trim($DB->filter($_POST["address"]));
                    $fax = trim($DB->filter($_POST["fax"]));

                    //
                    $update = $DB->SqlWork(
                        "UPDATE settings SET phone=?, email=?, address=?, fax=? WHERE id=?",
                        array($phone, $email, $address, $fax, 1),
                        1
                    );


                    if ($update) { //
            ?>
            <div class="alert alert-success">Güncelleme İşleminiz başarılı</div>
            <meta http-equiv="refresh" content="3;url=<?= SITE ?>contact">
            <?php
                    } else {
                    ?>
            <div class="alert alert-danger">Kaydederken sorun oluştu</div>
            <meta http-equiv="refresh" content="10;">
            <?php
                    } //
                } else {
                    ?>
            <div class="alert alert-danger">Lütfen tüm alanları doldurunuz</div>
            <meta http-equiv="refresh" content="3;">
            <?php
                }
            }
            ?>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="card-body card card-primary">
                    <div class="row">


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="Site Phone" name="phone"
                                    value="<?= $phone ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="email..." name="email"
                                    value="<?= $email ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Address ..." name="address"
                                    value="<?= $address ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" class="form-control" placeholder="Fax ..." name="fax"
                                    value="<?= $fax ?>">
                            </div>
                        </div>



                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">UPDATE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>