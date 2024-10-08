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
                if (!empty($_POST["title"]) && !empty($_POST["setkeys"]) && !empty($_POST["description"])) {
                    $title = trim($DB->filter($_POST["title"]));
                    $keys = trim($DB->filter($_POST["setkeys"]));
                    $description = trim($DB->filter($_POST["description"]));

                    //
                    $update = $DB->SqlWork(
                        "UPDATE settings SET title=?, setkeys=?, content=? WHERE id=?",
                        array($title, $keys, $description, 1),
                        1
                    );


                    if ($update) { //
            ?>
                        <div class="alert alert-success">Güncelleme İşleminiz başarılı</div>
                        <meta http-equiv="refresh" content="3;url=<?= SITE ?>seo-settings">
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
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Site title ..." name="title"
                                    value="<?= $websiteTitle ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text" class="form-control" placeholder="key ..." name="setkeys"
                                    value="<?= $websitekeys ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" placeholder="description ..." name="description"
                                    value="<?= $websiteContent ?>">
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