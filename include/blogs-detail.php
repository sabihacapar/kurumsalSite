<?php
if (!empty($_GET["seflink"])) {
    $seflink = $DB->filter($_GET["seflink"]);
    $data = $DB->getAll("blogs", "WHERE seflink=? AND state=?", array($seflink, 1), "ORDER BY ID ASC", 1);
    if ($data) {

?>


<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3><?= stripslashes($data[0]["title"]) ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- about_mission  -->
<div class="about_mission">
    <div class="container">
        <div class="row align-items-center">
            <?php
                    if (!empty($data[0]["image"])) {
                    ?>
            <div class="col-xl-6 col-md-6">
                <<img src="<?= SITE ?>images/blogs/<?= $data[0]["image"] ?>" style="width:100%; height:auto;">
            </div>

            <div class="col-xl-6 col-md-6">
                <div class="about_text">
                    <h4><?= stripslashes($data[0]["title"]) ?></h4>
                    <p><?= stripslashes($data[0]["texts"]) ?></p>
                </div>
            </div>
            <?php
                    } else {
                    ?>
            <div class="col-xl-12 col-md-12">
                <div class="about_text">
                    <h4><?= stripslashes($data[0]["title"]) ?></h4>
                    <p><?= stripslashes($data[0]["texts"]) ?></p>
                </div>
            </div>
            <?php
                    }
                    ?>

        </div>
    </div>
</div>
<?php
    }
}
?>