<?php session_start(); //oturum işlemi başlatır. 
ob_start(); //yönlendirme ve bazı header işlemleri için 
define("DATA", "data/");
define("SAYFA", "include/");
define("CLASSES", "class/");

include_once(DATA . "connection.php");
define("SITE", $websiteurl . "yonetimPaneli/");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $websiteTitle ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta http-equiv="keywords" content="<?= $websitekeys ?>">
    <meta http-equiv="description" content="<?= $websiteContent ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= SITE ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= SITE ?>"><b>INCE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?php
                if ($_POST) {
                    if (trim($_POST["username"]) !== '' && trim($_POST["password"]) !== '') {
                        $email = trim($DB->filter($_POST["username"]));
                        $password = trim($DB->filter($_POST["password"]));

                        // Veritabanından kullanıcıyı çek
                        $control = $DB->getAll("users", " WHERE username=?", array($email), "ORDER BY ID ASC", 1);

                        // Kullanıcı bulunduysa şifreyi doğrula
                        if ($control && password_verify(trim($DB->filter($_POST["password"])), $control[0]["password"])) {
                            $_SESSION["username"] = $control[0]["username"];
                            $_SESSION["namesurname"] = $control[0]["namesurname"];
                            $_SESSION["email"] = $control[0]["email"];
                            $_SESSION["id"] = $control[0]["id"];
                ?>
                            <div class="alert alert-success">Giriş İşleminiz başarılı...</div>
                            <meta http-equiv="refresh" content="2;url=<?= SITE ?>">
                        <?php
                            exit(); //otomatik olarak program sonlanır
                        } else {
                        ?>
                            <div class="alert alert-danger">Kullanıcı adı veya şifre hatalı</div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-danger">Lütfen tüm alanları doldurunuz</div>
                        <meta http-equiv="refresh" content="3;">
                <?php
                    }
                }
                ?>


                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <p class="mb-0">
                    <a href="<?= SITE ?>register" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= SITE ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= SITE ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= SITE ?>dist/js/adminlte.min.js"></script>

</body>

</html>