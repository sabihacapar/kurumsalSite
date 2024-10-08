<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="<?= SITE ?>">
                                <img src="<?= SITE ?>img/footer_logo.png" alt="">
                            </a>
                        </div>
                        <p>
                            Profesyonel web siteleri için<br> doğru adrestesiniz <br>

                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Hızlı Menü
                        </h3>
                        <ul>
                            <li><a href="<?= SITE ?>">ANASAYFA </a></li>
                            <?php
                            $kurumsal = $DB->getAll("institutional", " WHERE state=?", array(1), "ORDER BY orderno ASC");
                            if ($kurumsal) {
                                for ($i = 0; $i < count($kurumsal); $i++) {
                            ?>
                            <li><a
                                    href="<?= SITE ?>institutional/<?= $kurumsal[$i]["seflink"] ?>"><?= stripslashes($kurumsal[$i]["title"]) ?></a>
                            </li>
                            <?php

                                }
                            }

                            ?>

                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Diğer Sayfalar
                        </h3>
                        <ul>
                            <?php $modules = $DB->getAll("modules", "WHERE state=?", array(1), "ORDER BY ID ASC");
                            for ($i = 0; $i < count($modules); $i++): ?>
                            <li>
                                <a href="<?= SITE ?>list/<?= $modules[$i]["tables"] ?>">
                                    <p><?= $modules[$i]["title"] ?></p>
                                </a>
                            </li>
                            <?php endfor ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> Tüm hakları saklıdır<i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">İnce</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>