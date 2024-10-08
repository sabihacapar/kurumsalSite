<?php

if (!empty($_GET['tables']) && !empty($_GET['id'])) {

    // Sanitize the table name using filter method
    $table = $DB->filter($_GET['tables']);
    $id = $DB->filter($_GET['id']);


    // Fetch module data from the database
    $control = $DB->getAll("modules", "WHERE tables=? AND state=?", array($table, 1), "ORDER BY ID ASC", 1);

    if ($control) {
        $sqlid = $DB->getAll($control[0]["tables"], "WHERE id=?", array($id), "ORDER BY ID ASC", 1);

        if ($sqlid) {
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $control[0]["title"] ?>UPDATE</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $control[0]["title"] ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= SITE ?>add/<?= $control[0]["tables"] ?>" class="btn btn-success"
                        style="margin:10px; padding:5px; float:right;"> <i class="fa fa-plus"></i>
                        ADD NEW</a>
                </div>
            </div>

            <?php
                        // Handle form submission
                        if ($_POST) {
                            // Ensure all required fields are filled
                            if (!empty($_POST["categoryId"]) && !empty($_POST["title"]) && !empty($_POST["clef"]) && !empty($_POST["description"]) && !empty($_POST["orderno"])) {
                                $title = trim($DB->filter($_POST["title"]));
                                $seflink = trim($DB->seflink($title));
                                $categories = trim($DB->filter($_POST["categoryId"]));
                                $texts = trim($DB->filter($_POST["texts"], true));
                                $keys = trim($DB->filter($_POST["clef"]));
                                $description = trim($DB->filter($_POST["description"]));
                                $orderno = trim($DB->filter($_POST["orderno"]));

                                //
                                if (!empty($_FILES["image"]["name"])) {
                                    $upload = $DB->upload("image", "../img/" . $control[0]["tables"] . "/");
                                    if ($upload) {
                                        $add = $DB->SqlWork(
                                            "UPDATE " . $control[0]["tables"] . " SET title=?, seflink=?, categoryId=?, texts=?, image=?, clef=?, description=?, state=?, orderno=?, date=? WHERE id=?",
                                            array($title, $seflink, $categories, $texts, $upload, $keys, $description, 1, $orderno, date("Y-m-d"), $sqlid[0]["id"])
                                        );
                                    } else {

                        ?>
            <div class="alert alert-info">Resim yükleme başarısız oldu</div>
            <?php
                                    }
                                } else {
                                    $add = $DB->SqlWork(
                                        "UPDATE " . $control[0]["tables"] . " SET title=?, seflink=?, categoryId=?, texts=?, clef=?, description=?, state=?, orderno=?, date=? WHERE id=?",
                                        array($title, $seflink, $categories, $texts, $keys, $description, 1, $orderno, date("Y-m-d"), $sqlid[0]["id"])
                                    );
                                } //

                                if ($add) { //
                                    $sqlid = $DB->getAll($control[0]["tables"], "WHERE id=?", array($sqlid[0]["id"]), "ORDER BY ID ASC");

                                    ?>
            <div class="alert alert-success">Kaydetme İşleminiz başarılı</div>
            <meta http-equiv="refresh" content="3;url=<?= SITE ?>">
            <?php
                                } else {
                                ?>
            <div class="alert alert-danger">Kaydederken sorun oluştu</div>
            <meta http-equiv="refresh" content="10;url=<?= SITE ?>">

            <?php
                                } //
                            } else {
                                ?>
            <div class="alert alert-danger">Lütfen tüm alanları doldurunuz</div>
            <meta http-equiv="refresh" content="10;url=<?= SITE ?>">

            <?php
                            }
                        }
                        ?>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="card-body card card-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control select2" style="width: 100%;" name="categoryId">
                                    <?php
                                                $result = $DB->categoryGetAll($control[0]["tables"], $sqlid[0]["categoryId"], -1);
                                                if ($result) {
                                                    echo $result;
                                                } else {
                                                    echo $DB->categoryGet($control[0]["tables"]);
                                                }
                                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="title ..." name="title"
                                    value="<?= stripslashes($sqlid[0]["title"]) ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="textarea" placeholder="Place some text here" name="texts"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= stripslashes($sqlid[0]["texts"]) ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text" class="form-control" placeholder="key ..." name="clef"
                                    value="<?= stripslashes($sqlid[0]["clef"]) ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" placeholder="description ..." name="description"
                                    value="<?= stripslashes($sqlid[0]["description"]) ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Order No</label>
                                <input type="number" class="form-control" placeholder="order ..." name="orderno"
                                    value="<?= stripslashes($sqlid[0]["orderno"]) ?>" style="width:100px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
        } else {
        ?>
<div class="alert alert-warning">
    Böyle bir veri bulunamadı
</div>
<meta http-equiv="refresh" content="10;url=<?= SITE ?>">
<?php
        }

        ?>
<?php  } else {
        // If $control is not found, display error and redirect
    ?>
<div class="content-wrapper">
    <div style="padding:10px;margin: 25px;" class="alert alert-danger">The page you are looking for was not found.</div>
</div>
<?php
    }
} else {
    // If $_GET['tables'] is empty, redirect or show an error
    ?>
<div class="content-wrapper">
    <div style="padding:10px;margin: 25px;" class="alert alert-danger">Tablo parametresi eksik.</div>
</div>
<?php
}

?>