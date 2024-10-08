<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">MODULE ADD</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Module Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <?php
            if ($_POST) {
                $worker = $DB->ModuleAdd();
                if ($worker) {
                    echo '<div style="margin:10px;background: linear-gradient(to right, #b0e57c, #4caf50); color: white; padding: 10px; font-weight: bold; border-radius: 5px;">Modülünüz başarıyla eklenmiştir.</div>';
                    ?>
            <meta http-equiv="refresh" content="3;url=<?= SITE ?>">
            <?php
                } else {
                    echo '<div  style="margin:10px; background: linear-gradient(to right, #ff4d4d, #ff6666); color: white; padding: 10px; font-weight: bold; border-radius: 5px;">Bir hata oluştu. Lütfen tekrar deneyin.</div>';
                }
                ?>
            <meta http-equiv="refresh" content="3;url=<?= SITE ?>">
            <?php
            }
            ?>

            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Module Screen</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="#" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="state"
                                    checked="checked">
                                <label class="form-check-label" for="exampleCheck1">State</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">MODULE ADD</button>
                        </div>
                    </form>
                </div>



            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>