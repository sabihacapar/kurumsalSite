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
            $delete = $DB->SqlWork("DELETE FROM " . $table . " WHERE id=?", array($id), 1);
            if ($delete) {
?>
<div class="container">
    <div style="margin: 20px; padding:20px;" class="alert alert-success">Silme İşleminiz başarıyla gerçekleşti.</div>
    <meta http-equiv="refresh" content="30;url=<?= SITE ?>list/<?= $control[0]["tables"] ?>">

</div>
<?php
            }
            ?>


<?php
        } else {
        ?>
<meta http-equiv="refresh" content="3;url=<?= SITE ?>list/<?= $control[0]["tables"] ?>">


<?php        }
        ?>



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