<?php include '../includes/header.php'; ?>
<style>
  .menu-header, .sub-title { text-align: center; }
</style>
<div class="background"></div>
<div class="menu-page">
  <div class="cart-icon">
    <a href="../keranjang/index6.php">
      <img src="../assets/img/icon-kantong.jpg" alt="Cart" />
    </a>
  </div>
  <div class="menu-header">
    <h2>Fresh Fruit<br>Cake Order</h2>
  </div>
  <h3 class="sub-title">Take a bite</h3>
  <div class="cake-grid">
    <!-- ===== SEMUA LINK DI BAWAH INI SUDAH DIPERBAIKI ===== -->
    <div class="cake-item">
      <a href="../add_to_cart.php?id=poundcake">
        <img src="../assets/img/poundcake.jpg" alt="Pound Cake">
      </a>
      <p>Pound Cake<br><span>10.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=buttercake">
        <img src="../assets/img/butter-cake.jpg" alt="Butter Cake">
      </a>
      <p>Butter Cake<br><span>15.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=sponge">
        <img src="../assets/img/sponge.jpg" alt="Sponge Cake">
      </a>
      <p>Sponge Cake<br><span>20.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=skincake">
        <img src="../assets/img/skincake.jpg" alt="Skin Cake">
      </a>
      <p>Skin Cake<br><span>20.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=floating">
        <img src="../assets/img/cake2.jpg" alt="Floating Cake">
      </a>
      <p>Floating Cake<br><span>25.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=pigcake">
        <img src="../assets/img/pigcake.jpg" alt="Pig Cake">
      </a>
      <p>Pig Cake<br><span>10.000</span></p>
    </div>
  </div>
  <div class="bottom-nav">
    <a href="../favorit/index4.php" class="nav-item">
      <img src="../assets/img/icon-home.png" alt="Explore">
      <span>Explore</span>
    </a>
    <a href="../keranjang/index6.php" class="nav-item">
      <img src="../assets/img/icon-order.png" alt="Order">
      <span>Order</span>
    </a>
    <a href="../akun/index1.php" class="nav-item">
      <img src="../assets/img/icon-akun.png" alt="Account">
      <span>Account</span>
    </a>
  </div>
</div>
<?php include '../includes/footer.php'; ?>