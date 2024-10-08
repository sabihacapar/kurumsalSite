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
                        <li class="breadcrumb-item active">SEO Settings</li>
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
                if (!empty($_POST["namesurname"]) && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
                    $namesurname = trim($DB->filter($_POST["namesurname"]));
                    $username = trim($DB->filter($_POST["username"]));
                    $email = trim($DB->filter($_POST["email"]));
                    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

                    //
                    $add = $DB->SqlWork(
                        "INSERT INTO users (namesurname, username, email, password, date) VALUES (?,?,?,?,?)",
                        array($namesurname, $username, $email, $password, date("Y-m-d")),
                        1
                    );


                    if ($add) { //
            ?>
                        <div class="alert alert-success">Kullanıcı ekleme işleminiz başarılı İşleminiz başarılı</div>
                        <meta http-equiv="refresh" content="3;url=<?= SITE ?>login">
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
                                <label>Name-Surname</label>
                                <input type="text" class="form-control" placeholder="Name surname" name="namesurname">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="email ..." name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="password ..." name="password">
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