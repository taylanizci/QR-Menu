<?php include "header.php"; ?>
<?php include "inc/dbconnect.php"; ?>

<?php
$ayarlarquery=$db->prepare("SELECT * FROM ayarlar");
$ayarlarquery->execute(array(0));
$ayarlar=$ayarlarquery->fetch(PDO::FETCH_ASSOC);
?>

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Genel Ayarlar </h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kontrol Paneli</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Ayarlar</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Genel Ayarlar</li>
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
                                <h5 class="card-header">Genel Ayarlar</h5>
                                <div class="card-body">
                                    <form action="inc/process.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" name="site_logo" value="<?php echo $ayarlar['site_logo'] ?>">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Seçili Logo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <div class="m-r-10"><img src="<?php echo '../'.$ayarlar['site_logo'] ?>" class="rounded" width="100"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Logo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="site_logo" class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" name="site_logo" value="<?php echo $_POST['site_logo'] ?>">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Site Başlık</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="site_baslik" value="<?php echo $ayarlar['site_baslik'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Site Açıklama</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <textarea class="form-control" name="site_aciklama"><?php echo $ayarlar['site_aciklama'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Site Anahtar Kelimeler</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <textarea class="form-control" name="site_anahtar_kelimeler"><?php echo $ayarlar['site_anahtar_kelimeler'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Site Sahip</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" name="site_sahip" value="<?php echo $ayarlar['site_sahip'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button name="ayarlar" type="submit" class="btn btn-space btn-primary">Kaydet</button>
                                            </div>
                                        </div>
                                    </form>
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