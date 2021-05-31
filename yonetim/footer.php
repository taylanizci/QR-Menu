
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- sweetalert2 -->
    <script src="assets/sweetalert2/sweetalert2.all.min.js"></script>


    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

</body>
 
</html>

<?php if (@$_GET['status'] == "success") { ?>
<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2500
})

Toast.fire({
  type: 'success',
  title: 'İşleminiz Başarıyla Gerçekleştirilmiştir!'
})
</script>
<?php } else if (@$_GET['status'] == "error") { ?>
<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2500
})

Toast.fire({
  type: 'error',
  title: 'Ters Giden Bir Şeyler Var!'
})
</script>
<?php } ?>