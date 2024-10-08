<?php

if (!empty($_GET['tables'])) {

    $table = $DB->filter($_GET['tables']);

    $control = $DB->getAll("modules", "WHERE tables=? AND state=?", array($table, 1), "ORDER BY ID ASC", 1);

    if ($control) {


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $control[0]["title"] ?></h1>
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
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Description</th>
                                <th>State</th>
                                <th>Order No</th>
                                <th>Date</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $sql = $DB->getAll($control[0]['tables'], "", "", "ORDER BY ID ASC");
                                    $order = 1;

                                    if ($sql) {
                                        for ($i = 0; $i < count($sql); $i++) {
                                            if ($sql[$i]['state'] == 1) {
                                                $onoff = 'checked="checked"';
                                            } else {
                                                $onoff = '';
                                            }
                                    ?>
                            <tr>
                                <td><?= $order++; ?></td>
                                <td><?= mb_substr(strip_tags(stripslashes($sql[$i]['description'])), 0, 130)  ?></td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input onoff<?= $sql[0]['id'] ?>"
                                            id="customSwitch1" <?= $onoff ?>value="<?= $sql[0]["id"] ?>"
                                            onclick="onoff(<?= $sql[0]['id'] ?>, '<?= $control[0]['tables'] ?>');">
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                    </div>
                                </td>

                                <td><?= $sql[$i]['orderno'] ?></td>
                                <td><?= $sql[$i]['date'] ?></td>
                                <td>
                                    <a href="<?= SITE ?>update/<?= $control[0]['tables'] ?>/<?= $sql[$i]['id'] ?>"
                                        class="brn btn-warning btn-sm">UPDATE</a>
                                    <a href="<?= SITE ?>delete/<?= $control[0]['tables'] ?>/<?= $sql[$i]['id'] ?>"
                                        class="brn btn-danger btn-sm">DELETE</a>
                                </td>



                            </tr>

                            <?php
                                        }
                                    }

                                    ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php

    } else {
    ?>
<div class=" content-wrapper">
    <div style="padding:10px;margin: 25px;" class="alert alert-danger">Aradığınız sayfa bulunamadı
    </div>
    <!-- sayfa bulunamadığı taktirde 3 saniye sonra ana sayfaya yönlendirir. -->
    <meta http-equiv="refresh" content="3;url=<?= SITE ?>">
</div>
<?php
    }
}
?>
<meta http-equiv="refresh" content="3000;url=<?= SITE ?>">