<?php include '../includes/header.php'; ?>

<style>
.sukses-section {
  min-height: 100vh;
  background: url('../assets/img/begrondasar.jpg') no-repeat center center;
  background-size: cover;
  background-attachment: fixed;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-family: 'Segoe UI', sans-serif;
  padding: 30px 20px;
  text-align: center;
  position: relative;
}

.image-wrapper {
  position: relative;
  width: 200px;
  margin-bottom: 20px;
}

.sukses-img {
  width: 100%;
  border-radius: 12px;
  box-shadow: 0 0 12px rgba(0,0,0,0.2);
}

.kue-lingkaran {
  position: absolute;
  top: 45%;
  left: 36%; /* geser ke kiri */
  transform: translate(-50%, -50%);
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
  background: white;
  /* border dihilangkan */
}

.sukses-section h2 {
  color: #4b2c20;
  font-size: 28px;
  margin-bottom: 10px;
  font-weight: bold;
}

.sukses-section p {
  font-size: 16px;
  color: #333;
  margin-bottom: 25px;
  line-height: 1.5;
}

.sukses-section h3 {
  color: #4b2c20;
  font-size: 20px;
  margin-bottom: 10px;
}

.stars {
  font-size: 26px;
  color: gold;
  margin-bottom: 30px;
}

.thankyou-btn {
  background-color: #4b2c20;
  color: white;
  border: none;
  border-radius: 10px;
  padding: 12px 30px;
  font-size: 18px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.thankyou-btn:hover {
  background-color: #603a28;
}
</style>

<section class="sukses-section">
  <div class="image-wrapper">
    <img src="../assets/img/bag-cake.jpg" class="sukses-img" alt="Order Delivered">
    <img src="../assets/img/butter-cake.jpg" class="kue-lingkaran" alt="Kue">
  </div>

  <h2>Successfully Delivered !!</h2>
  <p>Thank You for your Order<br>Enjoy your meal !!</p>

  <h3>Rate Cake</h3>
  <div class="stars">★ ★ ★ ★ ☆</div>

  <!-- INI DIA PERBAIKANNYA -->
  <button class="thankyou-btn" onclick="window.location.href='../index13.php'">THANK YOU :)</button>
  <!-- AKHIR PERBAIKAN -->

</section>

<?php include '../includes/footer.php'; ?>