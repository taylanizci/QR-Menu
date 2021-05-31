<?php include "header.php"; ?>
<?php include "inc/dbconnect.php"; ?>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Ana Sayfa </h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kontrol Paneli</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ana Sayfa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
                <!-- WIDGET 1 AREA START -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- four widgets   -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- total views   -->
                    <!-- ============================================================== -->
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <?php
                                    $count=$db->prepare("select * from menu");
                                    $count->execute();
                                    $no=$count->rowCount();
                                    ?>
                                    <h5 class="text-muted">Toplam Ürün</h5>
                                    <h2 class="mb-0"> <?php echo $no; ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                    <i class="fa fa-list fa-fw fa-sm text-brand"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <?php
                                    $count=$db->prepare("select * from kategori");
                                    $count->execute();
                                    $kat=$count->rowCount();
                                    ?>
                                    <h5 class="text-muted">Toplam kategori</h5>
                                    <h2 class="mb-0"> <?php echo $kat; ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                    <i class="fa fa-list-alt fa-fw fa-sm text-brand"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end total earned   -->
                    <!-- ============================================================== -->
                </div>
                <!-- WIDGET 1 AREA END -->

                
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">QR Kod Oluştur</h5>
                        <div class="card-body"><label class="col-12 col-sm-3 col-form-label text-sm-right">Qr Kodunuz:</label>
                            <img src="../images/qr-kod.png">
                            <form action="inc/process.php" method="POST" enctype="multipart/form-data">
                               <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">URL Adresi:</label>
                                <div class="col-12 col-sm-4">
                                    <input type="text" name="qrurl" placeholder=" " class="form-control">
                                </div>
                            </div>
                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button name="qryap" type="submit" class="btn btn-space btn-success">Oluştur</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>
<?php include "footer.php"; ?>