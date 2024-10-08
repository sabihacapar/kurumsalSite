<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Bloglar</h3>
                    <div class="search-form" style="margin-top: 20px; ">
                        <form action="#" method="post">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-md-6">
                                    <div class="input_field">
                                        <input class="form-control" type="text" name="title"
                                            placeholder="Aramak istediğiniz bilgiyi yazınız.">
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-4">
                                    <div class="button_search" style="text-align: left;">
                                        <button class="boxed-btn2" type="submit">Arama Yap</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
            if ($_POST) {
                if (!empty($_POST["title"])) {

                    $title = $DB->filter($_POST["title"]);
                    $blogs = $DB->getAll("blogs", " WHERE state=? AND (title LIKE ? OR texts LIKE ?)", array(1, '%' . $title . '%', '%' . $title . '%'), "ORDER BY orderno ASC");
                } else {
                    $blogs = $DB->getAll("blogs", " WHERE state=?", array(1), "ORDER BY orderno ASC");
                }
            } else {
                $blogs = $DB->getAll("blogs", " WHERE state=?", array(1), "ORDER BY orderno ASC");
            }
            if ($blogs) {
                for ($i = 0; $i < count($blogs); $i++) {
                    if (!empty($blogs[$i]["image"])) {
                        $image = $blogs[$i]["image"];
                    } else {
                        $image = 'varsayilan.png';
                    }
            ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single_explorer">
                            <div class="thumb">
                                <img src="<?= SITE ?>images/blogs/<?= $image;
                                                                    ?>" alt="<?= stripslashes($blogs[$i]["title"]) ?>">
                            </div>
                            <div class="explorer_bottom d-flex">

                                <div class="explorer_info">
                                    <h3><a
                                            href="<?= SITE ?>blogs-detail/<?= $blogs[$i]["seflink"] ?>"><?= stripslashes($blogs[$i]["title"]) ?></a>
                                    </h3>
                                    <p><?= mb_substr(strip_tags(stripslashes($blogs[$i]["texts"])), 0, 120, "UTF-8") ?>...</p>

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