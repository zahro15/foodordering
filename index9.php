<?php  
session_start(); 
include '../includes/header.php'; 
?>

<style>
.delivery-page {
  min-height: 100vh;
  background: url('../assets/img/map-peta-jalan.png') no-repeat center center;
  background-size: cover;
  background-position: center;
  font-family: 'Segoe UI', sans-serif;
  padding: 80px 20px 20px 20px;
  position: relative;
}

h2.delivery-title {
  text-align: center;
  margin: 0 0 20px 0;
  color: #000;
  font-weight: bold;
  font-size: 24px;
  z-index: 3;
  position: relative;
}

.clickable-bottom {
  position: absolute;
  bottom: 100px;
  left: 0;
  width: 100%;
  height: 50px;
  z-index: 5;
  cursor: pointer;
}
</style>

<div class="delivery-page">
  <h2 class="delivery-title"></h2>

  <!-- Area klik -->
  <div class="clickable-bottom" onclick="lanjutkan()"></div>
</div>

<script>
function lanjutkan() {
  <?php
    $metode = $_SESSION['metode'] ?? '';

    if ($metode === 'Transfer') {
      echo "window.location.href = '../sukses/index11.php';";
    } elseif ($metode === 'Cash') {
      echo "window.location.href = '../struk/index10.php';";
    } else {
      echo "alert('Metode pembayaran belum dipilih.');";
    }
  ?>
}
</script>

<?php include '../includes/footer.php'; ?>
