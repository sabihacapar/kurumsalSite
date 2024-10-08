<?php
if (!empty($_GET["seflink"])) {
    $seflink = $DB->filter($_GET["seflink"]);
    $data = $DB->getAll("institutional", "WHERE seflink=? AND state=?", array($seflink, 1), "ORDER BY ID ASC", 1);
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
                <<img src="<?= SITE ?>images/institutional/<?= $data[0]["image"] ?>" style="width:100%; height:auto;">
            </div>

            <div class="col-xl-6 col-md-6">
                <div class="about_text">
                    <h4>Our Mission</h4>
                    <p><?= stripslashes($data[0]["texts"]) ?></p>
                </div>
            </div>
            <?php
                    } else {
                    ?>
            <div class="col-xl-12 col-md-12">
                <div class="about_text">
                    <h4>Our Mission</h4>
                    <p><?= stripslashes($data[0]["texts"]) ?></p>
                </div>
            </div>
            <?php
                    }
                    ?>

        </div>
    </div>
</div>



<!--/ sprayed_area end  -->

<!-- testimonial_area  -->
<div class="testimonial_area  ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-60 text-center">
                    <p>Testimonials</p>
                    <h3>
                        What our Client Says
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="single_testmonial text-center">
                            <div class="quote">
                                <img src="img/svg_icon/quote.svg" alt="">
                            </div>
                            <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                <br>
                                Fusce ac mattis nulla. Morbi eget ornare dui.
                            </p>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="img/case/testmonial.png" alt="">
                                </div>
                                <h3>Robert Thomson</h3>
                                <span>Business Owner</span>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="single_testmonial text-center">
                            <div class="quote">
                                <img src="img/svg_icon/quote.svg" alt="">
                            </div>
                            <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                <br>
                                Fusce ac mattis nulla. Morbi eget ornare dui.
                            </p>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="img/case/testmonial.png" alt="">
                                </div>
                                <h3>Robert Thomson</h3>
                                <span>Business Owner</span>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="single_testmonial text-center">
                            <div class="quote">
                                <img src="img/svg_icon/quote.svg" alt="">
                            </div>
                            <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                <br>
                                Fusce ac mattis nulla. Morbi eget ornare dui.
                            </p>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="img/case/testmonial.png" alt="">
                                </div>
                                <h3>Robert Thomson</h3>
                                <span>Business Owner</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
?>