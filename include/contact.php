<?php
include_once(CLASSES . "class.phpmailer.php");
include_once(CLASSES . "class.smtp.php");
?>


<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>İletişim</h3>
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
            <div class="col-lg-8">
                <?php
if ($_POST) {
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["message"])) {
        $name = $DB->filter($_POST["name"]);
        $email = $DB->filter($_POST["email"]);
        $subject = $DB->filter($_POST["subject"]);
        $phone = $DB->filter($_POST["phone"]);
        $message = $DB->filter($_POST["message"]);
        $information = "Ad Soyad: " . $name . " Telefon : " . $phone . " Email : " . $email;
        
        // Mail gönder ve hata kontrolü yap
        $mailSend = $DB->MailGonder("sbhacpr10@gmail.com", $subject, $information);
        
        if ($mailSend === true) {
            ?>
                <div class="alert alert-success">
                    Mesajınız başarılı olarak iletilmiştir.
                </div>
                <?php
        } else {
            // Hata mesajını yazdır
            ?>
                <div class="alert alert-danger">
                    Mesajınız iletilememiştir. Hata: <?= $mailSend; ?>
                </div>
                <?php
        }
    } else {
        ?>
                <div class="alert alert-danger">Lütfen boş bıraktığınız alanları doldurunuz</div>
                <?php
    }
}
?>
                <form class="form-contact contact_form" action="#" method="post">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Lütfen isminizi giriniz'"
                                    placeholder='Lütfen isminizi giriniz' required="required">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Lütfen mail adresinizi giriniz'"
                                    placeholder='Lütfen mail adresinizi giriniz' required="required">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="subject" type="text" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Lütfen konuyu giriniz'"
                                    placeholder='Lütfen konuyu giriniz' required="required">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="phone" type="text" maxlength="11"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Lütfen telefonunuzu giriniz'"
                                    placeholder='Lütfen telefonunuzu giriniz'>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <textarea class="form-control w-100" name="message" cols="30" rows="9"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Lütfen mesajınızı giriniz'"
                                    placeholder='Lütfen mesajınızı inizi giriniz' required="required"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm btn_4 boxed-btn">GÖNDER</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="media contact-info">
                    <div class="media-body">
                        <h3>BİZE ULAŞIN</h3>

                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Adres</h3>
                        <p><?= $address ?></p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>Telefon</h3>
                        <p><?= $phone ?></p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>Email</h3>
                        <p><?= $email ?></p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>Fax</h3>
                        <p><?= $fax ?></p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<!--/ sprayed_area end  -->