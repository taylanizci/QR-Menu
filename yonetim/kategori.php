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
                        <h2 class="pageheader-title">Kategoriler </h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kontrol Paneli</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kategoriler</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tüm Kategoriler</li>
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


                <div class="row">
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->

                    <!-- recent orders  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tüm Kategoriler</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Kategori</th>        
                                                <th width="80" class="border-0">İşlemler</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

$sayfada = 10; // Sayfada Gösterilecek İçerik Miktarını Belirliyoruz.

$sorgu=$db->prepare("SELECT * FROM kategori");
$sorgu->execute();
$toplam_menu=$sorgu->rowCount();

$toplam_sayfa = ceil($toplam_menu / $sayfada);

// Eğer Sayfa Girilmemişse 1 Sayalım

$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

// Eğer 1'den küçük bir sayfa sayısı girildiye 1 yapalım
if($sayfa < 1) $sayfa = 1;

// Toplam sayfa sayımızdan fazla yapılırsa en son sayfayı varsayalım
if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

$limit = ($sayfa - 1) * $sayfada;


$katsor=$db->prepare("SELECT * FROM kategori ORDER BY kat_sira ASC limit $limit, $sayfada");
$katsor->execute();
while ($kat=$katsor->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
    <td><?php echo $kat['kat_sira']; ?></td>
    <td><?php echo $kat['menu_kategori']; ?></td>

    <td>
        <div class="d-flex">
            <form action="kat-duzenle.php" method="POST">
               <input type="hidden" name="kategori_id" value="<?php echo $kat['kategori_id'] ?>">
               <button type="submit" name="katduzenle" class="btn btn-success btn-sm btn-icon-split">
                <span class="icon text-white-60">
                    <i class="fas fa-edit"></i>
                </span>
            </button>
        </form>
        <form class="mx-1" action="inc/process.php" method="POST">
            <input type="hidden" name="kategori_id" value="<?php echo $kat['kategori_id'] ?>">
            <button type="submit" name="katsil" class="btn btn-danger btn-sm btn-icon-split">
                <span class="icon text-white-60">
                    <i class="fas fa-trash"></i>
                </span>
            </button>
        </form>
    </div>
</td>
</tr>
<?php } ?>




</tbody>
</table>
<div align="right" class="col md-12">
    <ul class="pagination">

        <?php

        $s=0;

        while ($s < $toplam_sayfa) { $s++ ?>

            <?php if ($s==$sayfa) { ?>

                <li class="page-item active"><a class="page-link" href="kategori.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>

            <?php } else { ?>

                <li class="page-item"><a class="page-link" href="kategori.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>

            <?php } } ?>


        </ul>
    </div>
</div>

</div>
</div>
</div>
<!-- ============================================================== -->
<!-- end recent orders  -->


<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customer acquistion  -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end customer acquistion  -->
<!-- ============================================================== -->
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