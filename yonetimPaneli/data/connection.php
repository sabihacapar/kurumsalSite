<?php
//ilgili dosyaya gittikten sonra bağlantıyı sağlayıp bağlantı sonucunu döner
include_once(CLASSES . "class.upload.php");
include_once(CLASSES . "DB.php");
$DB = new DB();

$settings =  $DB->getAll("settings", "WHERE ID =?", array(1), "ORDER BY ID ASC", 1);
if ($settings != false) {
    $websiteTitle =  $settings[0]["title"];
    $websitekeys =  $settings[0]["setkeys"];
    $websiteurl =  $settings[0]["url"];
    $websiteContent =  $settings[0]["content"];
    $phone =  $settings[0]["phone"];
    $email =  $settings[0]["email"];
    $address =  $settings[0]["address"];
    $fax =  $settings[0]["fax"];
}
