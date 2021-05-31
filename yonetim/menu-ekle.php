<?php include "header.php"; ?>
<?php include "inc/dbconnect.php"; ?>
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Menü Ekle </h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kontrol Paneli</a></li>
                                        <li class="breadcrumb-item"><a href="menu.php" class="breadcrumb-link">Menüler</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Menü Ekle</li>
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
                                <h5 class="card-header">Menü Ekle</h5>
                                <div class="card-body">
                                    <form action="inc/process.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Kategori</label>
                                             
                                                 <select required id="kategori_id" name="kategori_id">
                                                    <option>Seçim Yapınız</option>
                                                <?php $katsor=$db->prepare("SELECT * FROM kategori");
                                                $katsor->execute();
                                                while ($kat=$katsor->fetch(PDO::FETCH_ASSOC)){ ?>
                                                <option  value="<?php echo $kat['kategori_id']; ?>"><?php echo $kat['menu_kategori']; ?></option>
                                                    <?php } ?>
                                                </select>
                                             
                                        </div>
                                         <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Eklenecek Resim</label>
                                            <div class="col-12 col-sm-4 col-lg-6">
                                                <input type="file" name="menu_resim" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ürün Adı</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="urun_baslik" placeholder="örn: Tost" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ürün Detayı</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="urun_detay" placeholder="örn: Domates,salatalık eşliğinde" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ürün Fiyatı</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="urun_fiyat" placeholder="örn: 19,99" class="form-control"required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Menü Sıra</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="menu_sira" placeholder="örn: 1" class="form-control"required>
                                            </div>
                                        </div>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button name="menuekle" type="submit" class="btn btn-space btn-primary">Ekle</button>
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