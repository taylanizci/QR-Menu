<?php include "header.php"; ?>
<?php include "inc/dbconnect.php"; ?>

<?php
if (isset($_POST['menu_id'])) {
	$menuquery=$db->prepare("SELECT * FROM menu where menu_id=:id");
	$menuquery->execute(array(
		'id' => $_POST['menu_id']
	));
	$menu=$menuquery->fetch(PDO::FETCH_ASSOC);
  
} else {
	header("Location: menu.php");
} 

?>

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Menü Düzenle </h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kontrol Paneli</a></li>
                                        <li class="breadcrumb-item"><a href="menu.php" class="breadcrumb-link">Menüler</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Menü Düzenle</li>
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
                                <h5 class="card-header">Menü Düzenle</h5>
                                <div class="card-body">
                                    <form action="inc/process.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Kategori</label>
                                            <select id="kategori_id" name="kategori_id" required>
                                                    <option>Seçim Yapınız</option>
                                                <?php $katsor=$db->prepare("SELECT * FROM kategori");
                                                $katsor->execute();
                                                while ($kat=$katsor->fetch(PDO::FETCH_ASSOC)){ ?>
                                                <option value="<?php echo $kat['kategori_id']; ?>"><?php echo $kat['menu_kategori']; ?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                        <input type="hidden" class="form-control" name="menu_resim" value="<?php echo $menu['menu_resim'] ?>">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Seçili Resim</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <div class="m-r-10"><img src="<?php echo '../'.$menu['menu_resim'] ?>" class="rounded" width="100"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ürün Resim</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="menu_resim" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ürün Adı</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="urun_baslik" value="<?php echo $menu['urun_baslik'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ürün Detay</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="urun_detay" value="<?php echo $menu['urun_detay'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ürün Fiyatı</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="urun_fiyat" value="<?php echo $menu['urun_fiyat'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Menü Sıra</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="menu_sira" value="<?php echo $menu['menu_sira'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" name="menu_id" value="<?php echo $_POST['menu_id'] ?>">
                                       
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button name="menuduzenle" type="submit" class="btn btn-space btn-primary">Kaydet</button>
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