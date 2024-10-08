<?php @session_start(); //oturum işlemi başlatır. 
@ob_start(); //yönlendirme ve bazı header işlemleri için 
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= SITE ?>dist/css/adminlte.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/daterangepicker/daterangepicker.css">

    <!-- DataTables -->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= SITE ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/select2/css/select2.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= SITE ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= SITE ?>plugins/summernote/summernote-bs4.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once(DATA . "header.php");
        //header alanını sayfaya dahil etmek için kullanıldı.
        ?>
        <?php include_once(DATA . "sidebar.php");
        //sidebar alanını sayfaya dahil etmek için kullanıldı.
        ?>
        <?php
        if ($_GET && !empty($_GET["page"])) {
            //!gelen değeri sayfaya ata
            $page = $_GET["page"] . ".php";

            if (file_exists(SAYFA . $page)) { //dosya kontrolü
                include_once(SAYFA . $page);
            } else { //eğer öyle bir sayfa yoksa
                include_once(SAYFA . "content.php"); //ana sayfaya yönlendir
            }
        } else {
            include_once(SAYFA . "content.php");
            //content(içerik) alanını sayfaya dahil etmek için kullanıldı.


        }
        ?>

        <?php include_once(DATA . "footer.php");
        //footer alanını sayfaya dahil etmek için kullanıldı.
        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= SITE ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= SITE ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= SITE ?>plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= SITE ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= SITE ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= SITE ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= SITE ?>plugins/moment/moment.min.js"></script>
    <script src="<?= SITE ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= SITE ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= SITE ?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= SITE ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= SITE ?>dist/js/adminlte.js"></script>
    <!-- DataTables -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <script src="<?= SITE ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= SITE ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= SITE ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= SITE ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script src="<?= SITE ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- Summernote -->


    <!-- AdminLTE for demo purposes -->
    <script src="<?= SITE ?>dist/js/demo.js"></script>
    <!-- DataTables -->


    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })



        })
    </script>

    <script>
        function onoff(id, tables) {
            var state = 0;
            if ($(".onoff" + id).is(':checked')) {
                state = 1;
            } else {
                state = 2;
            }
            $.ajax({
                method: "POST",
                url: "<?= SITE ?>ajax.php",
                data: {
                    "tables": tables,
                    "id": id,
                    "state": state
                },
                success: function(result) {
                    console.log(result); // Sunucudan gelen yanıtı tarayıcı konsolunda kontrol edin
                    if (result == "OK") {
                        console.log("Başarılı işlem");
                    } else {
                        alert("error: " + result); // Hata durumunda sunucudan gelen mesajı göster
                    }
                },
                error: function(xhr, status, error) {
                    console.log("AJAX Error:", error); // AJAX hatalarını konsola yazdır
                }
            })
        }
    </script>


</body>

</html>