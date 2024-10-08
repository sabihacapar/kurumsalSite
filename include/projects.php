<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Projelerimiz</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- about_mission  -->

<div class="explorer_europe">
    <div class="container" style="padding-top: 25px;">
        <div class="row align-items-center">
            <?php
            $projects = $DB->getAll("projects", " WHERE state=?", array(1), "ORDER BY orderno ASC");
            if ($projects) {
                for ($i = 0; $i < count($projects); $i++) {
                    if (!empty($projects[$i]["image"])) {
                        $image = $projects[$i]["image"];
                    } else {
                        $image = 'varsayilan.png';
                    }
            ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single_explorer">
                            <div class="thumb">
                                <img src="<?= SITE ?>images/projects/<?= $image;
                                                                        ?>"
                                    alt="<?= stripslashes($projects[$i]["title"]) ?>">
                            </div>
                            <div class="explorer_bottom d-flex">

                                <div class="explorer_info">
                                    <h3><a
                                            href="<?= SITE ?>projects-detail/<?= $projects[$i]["seflink"] ?>"><?= stripslashes($projects[$i]["title"]) ?></a>
                                    </h3>
                                    <p><?= mb_substr(strip_tags(stripslashes($projects[$i]["texts"])), 0, 120, "UTF-8") ?>...
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>


        </div>
    </div>
</div>



<!--/ sprayed_area end  -->