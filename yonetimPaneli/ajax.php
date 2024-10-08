<?php @session_start(); //oturum işlemi başlatır. 
@ob_start(); //yönlendirme ve bazı header işlemleri için 
define("DATA", "data/");
define("SAYFA", "include/");
define("CLASSES", "class/");

include_once(DATA . "connection.php");
define("SITE", $websiteurl);

if ($_POST) {
    if (!empty($_POST["tables"]) && !empty($_POST["id"]) && !empty($_POST["state"])) {

        $tables = $DB->filter($_POST["tables"]);
        $id = $DB->filter($_POST["id"]);
        $state = $DB->filter($_POST["state"]);

        // Boşluk ekleyerek sorguyu düzelttik
        $update = $DB->SqlWork("UPDATE " . $tables . " SET state=? WHERE id=?", array($state, $id), 1);
        if ($update) {
            echo "OK"; // "OK" ifadesini döndürüyoruz
        } else {
            echo "ERROR";
        }
    } else {
        echo "BLA";
    }
}
