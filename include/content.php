 <!-- slider_area_start -->
 <div class="slider_area">
     <div class="single_slider  d-flex align-items-center slider_bg_1">
         <div class="container">
             <div class="row align-items-center justify-content-center">
                 <div class="col-xl-10">
                     <div class="slider_text text-center justify-content-center">
                         <p>INCE A.Ş</p>
                         <h3>KURUMSAL FİRMA</h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- slider_area_end -->

 <div class="popular_catagory_area">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="section_title mb-60 text-center">
                     <h3>
                         Neler Yapıyoruz ?
                     </h3>
                 </div>
             </div>
         </div>
         <div class="row">
             <?php
                $services = $DB->getAll("services", " WHERE state=?", array(1), "ORDER BY orderno ASC", 8);
                if ($services) {
                    for ($i = 0; $i < count($services); $i++) {
                ?>
             <div class="col-xl-3 col-md-4 col-lg-3">
                 <div class="single_catagory">
                     <div class="thumb">
                         <img src="<?= SITE ?>img/catagory/1.png" alt="">
                     </div>
                     <div class="hover_overlay">
                         <div class="hover_inner">
                             <a
                                 href="<?= SITE ?>services-detail/<?= $services[$i]["seflink"] ?>"><?= stripslashes($services[$i]["title"]) ?></a>
                             <span><?= mb_substr(strip_tags(stripslashes($services[$i]["texts"])), 0, 120, "UTF-8") ?>...</span>
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

 <div class="explorer_europe">
     <div class="container">
         <div class="explorer_wrap">
             <div class="col-xl-12">
                 <div class="section_title mb-60 text-center">
                     <h3>
                         Projelerimiz
                     </h3>
                 </div>
             </div>
         </div>
         <div class="tab-content" id="nav-tabContent">
             <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                 <div class="row">
                     <?php
                        $projects = $DB->getAll("projects", " WHERE state=?", array(1), "ORDER BY orderno ASC", 6);
                        if ($projects) {
                            for ($i = 0; $i < count($projects); $i++) {
                        ?>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/1.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-beach"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a
                                             href="<?= SITE ?>projects-detail/<?= $projects[$i]["seflink"] ?>"><?= stripslashes($projects[$i]["title"]) ?></a>
                                     </h3>
                                     <p><?= mb_substr(strip_tags(stripslashes($projects[$i]["texts"])), 0, 120, "UTF-8") ?>...
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
             <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                 <div class="row">
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/2.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-food"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Freshly Food</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/1.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-beach"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Saintmartine</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/3.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-food-1"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Midnight</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/4.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-barbershop"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Barber</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/5.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-cabin"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Montana Resort</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/6.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-shop"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Yelled Shopping</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                 <div class="row">
                     <div class="col-xl-4 col-lg-4 col-md-4">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/4.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-barbershop"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Barber</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/1.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-beach"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Saintmartine</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/2.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-food"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Freshly Food</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/3.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-food-1"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Midnight</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/5.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-cabin"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Montana Resort</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/6.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-shop"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Yelled Shopping</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact-tab2">
                 <div class="row">
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/1.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-beach"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Saintmartine</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/2.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-food"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Freshly Food</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/3.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-food-1"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Midnight</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/4.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-barbershop"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Barber</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/5.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-cabin"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Montana Resort</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/6.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-shop"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Yelled Shopping</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="tab-pane fade" id="nav-contact3" role="tabpanel" aria-labelledby="nav-contact-tab3">
                 <div class="row">
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/1.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-beach"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Saintmartine</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/2.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-food"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Freshly Food</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/3.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-food-1"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Midnight</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/4.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-barbershop"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Barber</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/5.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-cabin"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Montana Resort</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6">
                         <div class="single_explorer">
                             <div class="thumb">
                                 <img src="<?= SITE ?>img/explorer/6.png" alt="">
                             </div>
                             <div class="explorer_bottom d-flex">
                                 <div class="icon">
                                     <i class="flaticon-shop"></i>
                                 </div>
                                 <div class="explorer_info">
                                     <h3><a href="single_listings.html">Yelled Shopping</a></h3>
                                     <p>700/D, Kings road, Green lane, London</p>
                                     <ul>
                                         <li> <i class="fa fa-phone"></i>
                                             +10 278 367 9823</li>
                                         <li><i class="fa fa-envelope"></i> contact@midnight.com</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>


 <!-- sprayed_area  -->
 <div class="sprayed_area overlay">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="text text-center">
                     <h3>Bize Ulaşın</h3>
                     <p>Soru, fikir, görüş ve önerileriniz için bizimle iletişime geçin...</p>
                     <a href="<?= SITE ?>contact" class="boxed-btn2">İletişime Geç</a>
                 </div>
             </div>
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
                     <?php

                        $blogs = $DB->getAll("blogs", " WHERE state=?", array(1), "ORDER BY orderno ASC", 4);
                        if ($blogs) {
                            for ($i = 0; $i < count($blogs); $i++) {
                        ?>
                     <div class="single_carousel">
                         <div class="single_testmonial text-center">
                             <div class="quote">
                                 <img src="<?= SITE ?>img/svg_icon/quote.svg" alt="">
                             </div>
                             <p><?= mb_substr(strip_tags(stripslashes($blogs[$i]["texts"])), 0, 60, "UTF-8") ?>...</p>

                             <div class="testmonial_author">
                                 <div class="thumb">
                                     <img src="<?= SITE ?>img/case/testmonial.png" alt="">
                                 </div>
                                 <h3><a
                                         href="<?= SITE ?>blogs-detail/<?= $blogs[$i]["seflink"] ?>"><?= stripslashes($blogs[$i]["title"]) ?></a>
                                 </h3>
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


     </div>
 </div>