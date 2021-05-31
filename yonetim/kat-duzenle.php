<?php include "header.php"; ?>
<?php include "inc/dbconnect.php"; ?>

<?php
if (isset($_POST['kategori_id'])) {
	$katquery=$db->prepare("SELECT * FROM kategori where kategori_id=:kid");
	$katquery->execute(array(
		'kid' => $_POST['kategori_id']
	));
	$kat=$katquery->fetch(PDO::FETCH_ASSOC);

} else {
	header("Location: kategori.php");
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
                    <h2 class="pageheader-title">Kategori Düzenle </h2>
                    <p class="pageheader-text"></p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item"><a href="kategori.php" class="breadcrumb-link">Kategoriler</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kategori Düzenle</li>
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
                    <h5 class="card-header">Kategori Düzenle</h5>
                    <div class="card-body">
                        <form action="inc/process.php" method="POST"enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="kat_img" value="<?php echo $kat['kat_img'] ?>">
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Seçili Resim</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <div class="m-r-10"><img src="<?php echo '../'.$kat['kat_img'] ?>" class="rounded" width="100"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Kategori Resim</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="file" name="kat_img" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Kategori</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" name="menu_kategori" value="<?php echo $kat['menu_kategori'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Kategori Sırası</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" name="kat_sira" value="<?php echo $kat['kat_sira'] ?>" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="kategori_id" value="<?php echo $_POST['kategori_id'] ?>">

                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button name="katduzenle" type="submit" class="btn btn-space btn-primary">Kaydet</button>
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