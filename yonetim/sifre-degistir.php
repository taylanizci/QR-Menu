<?php include "header.php"; ?>
<?php include "inc/dbconnect.php"; ?>

<?php

?>

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Profil Düzenle </h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kontrol Paneli</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    
                    
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Profil Düzenle</h5>
                                <div class="card-body">
                                    <form action="inc/process.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Eski Şifre</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="oldpass" placeholder="Eski Şifrenizi Giriniz" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Yeni Şifre</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="newpass1" placeholder="Yeni Şifrenizi Giriniz" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Yeni Şifre Tekrar</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="newpass2" placeholder="Yeni Şifrenizi Tekrar Giriniz" class="form-control">
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" name="kullanici_id" value="<?php echo $kullanici['kullanici_id'] ?>">
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button name="sifre" type="submit" class="btn btn-space btn-primary">Kaydet</button>
                                                </form>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
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