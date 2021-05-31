<?php include "header.php"; ?>

			<?php
			
			$list=0; // Burada bir sayaç başlattık.
        $katsor=$db->prepare("SELECT * FROM kategori ORDER BY kat_sira");
        $katsor->execute();
        while ($kat=$katsor->fetch(PDO::FETCH_ASSOC)) {	
		
		$kategori_id=$kat['kategori_id']; // Burada kategori ID aldık. Ürünleri çektiğin yere WHERE şartı olarak ekleyeceğiz.  
		 if ($list % 2 == 0){  // Burada sayaç numarası 2'ye tam bölünebiliyorsa diye bir şart koştuk.
		     
		     $class="left-content"; // 2'ye tam bölünebiliyorsa bu class ekle.
		     $class2="white-style";
		     $class3="";
		     
		 }else{
		     
		     $class="right-content"; // 2'ye tam bölünemiyorsa bu class'ı ekle dedik. 
		     $class2="";
		     $class3="col-sm-offset-4";

		 }
		?>		
		<section class="menu-section <?php echo $class; // $class değişkenini bastırdık. ?>">
			<div class="background-items">
				<div class="table-back"></div>
				<div class="image-back">
					<img src="<?php if($kat['kat_img']==""){echo 'upload/menu/b1.jpg';}else{
						echo $kat['kat_img'];
					} ?>" alt="" style="width: 100%;
  height: 100%;
  object-fit: cover;">
				</div>
			</div>
			
			<div class="menu-box">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 <?php echo $class3; // $class3 değişkenini bastırdık. ?>">
							
							<div class="title-section <?php echo $class2; // $class2 değişkenini bastırdık. ?>">
								
							
        	<h1> <?php echo $kat['menu_kategori']; ?> </h1>

							</div><?php 
        
        $menusor=$db->prepare("SELECT * FROM menu WHERE kategori_id='$kategori_id' ORDER BY menu_sira ASC"); // Burada WHERE şartı olarak ekledik. 
        $menusor->execute();
        while ($menu=$menusor->fetch(PDO::FETCH_ASSOC)) {  ?>
 							<ul class="menu-list-items">
								<li>
									<div class="list-content">
										<h2><?php echo $menu['urun_baslik'] ?></h2>
										<p><?php echo $menu['urun_detay'] ?></p>
									</div>
									<span class="price">₺<?php echo $menu['urun_fiyat'] ?></span>
								</li>
								
							</ul>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

		
		</section>
		

		
		
		
<?php $list++; // Burada her döngü tamamlandığında en son sayaç numarasına +1 ekledik. 
} ?>
		<!-- End menu section -->
		<?php include "footer.php"; ?>