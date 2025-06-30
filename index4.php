<?php include '../includes/header.php'; ?>

<style>
/* ===== HEADER ===== */
.header-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 25px;
  position: relative;
  z-index: 10;
}

.header-bar .icon-container {
  /* Memberi ruang yang pas untuk tombol bulat */
  flex: 0 0 44px; 
}

.header-bar .icon-container.right {
  text-align: right;
}


/* --- REVISI CSS ICON KEMBALI (SESUAI PERMINTAAN) --- */

/* 1. Kita styling 'wadah' link-nya (<a>), bukan gambarnya (<img>) */
.header-bar .back-icon {
  display: inline-flex; /* Membuatnya menjadi container flex */
  align-items: center;    /* Agar ikon pas di tengah vertikal */
  justify-content: center;/* Agar ikon pas di tengah horizontal */
  
  width: 44px;            /* Ukuran tombol bulat */
  height: 44px;           /* Ukuran tombol bulat */
  background-color: #ffffff; /* Warna solid lebih bersih */
  border-radius: 50%;     /* Membuatnya menjadi lingkaran sempurna */
  
  /* Bayangan yang modern dan lembut */
  box-shadow: 0 3px 10px rgba(0,0,0,0.1); 
  
  /* Animasi halus saat disentuh */
  transition: all 0.2s ease-in-out; 
}

/* 2. Tambahkan efek saat mouse menyentuh tombol */
.header-bar .back-icon:hover {
  transform: scale(1.1); /* Sedikit membesar */
  box-shadow: 0 4px 15px rgba(0,0,0,0.15); /* Bayangan lebih jelas */
}

/* 3. Atur ulang ukuran gambar ikon agar pas di dalam tombol bulat */
.header-bar .back-icon img {
  width: 22px;  /* Ukuran ikon di dalam tombol */
  height: 22px;
  /* Hapus style lama yang tidak perlu lagi */
  background-color: transparent; 
  border-radius: 0;
  padding: 0;
}
/* --- AKHIR DARI REVISI --- */


.header-bar .cart-icon img {
  width: 30px;
  height: 30px;
  background-color: white;
  border-radius: 20px;
  padding: 4px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  text-align: right;
}

.header-bar .header-title {
  flex-grow: 1;
  text-align: center;
  font-size: 23px; /* saya perbaiki dari 23x menjadi 23px */
  font-weight: bold;
  margin: 0;
  padding: 0 10px;
  line-height: 1.2;
}

/* ===== SUBTITLE (TIDAK ADA PERUBAHAN) ===== */
.sub-title {
  padding-left: 20px;
  margin-top: 15px;
  margin-bottom: 15px;
  font-size: 18px;
  font-weight: bold;
  color: #444;
  text-align: left;
}

/* ===== GRID CAKE (TIDAK ADA PERUBAHAN) ===== */
.cake-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12px;
  padding: 0 16px;
}

.cake-item {
  background-color: #fff;
  border-radius: 12px;
  padding: 8px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  text-align: center;
}

.cake-item img {
  width: 100%;
  border-radius: 10px;
  object-fit: cover;
  height: auto;
  max-height: 140px;
}

.cake-item p {
  font-size: 13px;
  font-weight: bold;
  margin: 6px 0 0;
}

.cake-item span {
  color: #777;
  font-weight: normal;
  font-size: 12px;
}

/* ===== BOTTOM NAVBAR (TIDAK ADA PERUBAHAN) ===== */
.bottom-nav {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-around;
  background-color: #f3e5dc;
  padding: 8px 0;
  border-top: 1px solid #ccc;
  z-index: 10;
}

.nav-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  color: #333;
  font-weight: bold;
  font-size: 12px;
}

.bottom-nav img {
  width: 22px;
  height: 22px;
  margin-bottom: 4px;
  display: block;
}
</style>

<!-- ======================================================= -->
<!-- BAGIAN HTML SAMA SEKALI TIDAK SAYA UBAH, FUNGSI 100% AMAN -->
<!-- ======================================================= -->

<div class="background"></div>
<div class="menu-page">

  <!-- ✅ HEADER: Kembali + Judul + Cart -->
  <div class="header-bar">
    <div class="icon-container left">
      <a href="../menu/index7.php" class="back-icon">
        <img src="../assets/img/icon-kembali.png" alt="Kembali">
      </a>
    </div>
    <h2 class="header-title">Top Favorite<br>Cake List</h2>
    <div class="icon-container right">
      <a href="../keranjang/index6.php" class="cart-icon">
        <img src="../assets/img/icon-kantong.jpg" alt="Cart">
      </a>
    </div>
  </div>

  <!-- ✅ Subtitle -->
  <h3 class="sub-title">Your Picks</h3>

  <!-- ✅ Grid Cake -->
  <div class="cake-grid">
    <div class="cake-item">
      <a href="../add_to_cart.php?id=poundcake">
        <img src="../assets/img/poundcake.jpg" alt="Pound Cake">
      </a>
      <p>Pound Cake<br><span>10.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=cakelove">
        <img src="../assets/img/cakelove.jpg" alt="Cake Love">
      </a>
      <p>Cake Love<br><span>15.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=oreo">
        <img src="../assets/img/cakeoreo.jpg" alt="Oreo">
      </a>
      <p>Cake Oreo<br><span>20.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=roolcake">
        <img src="../assets/img/roolcake.jpeg" alt="Roolcake">
      </a>
      <p>Rool Cake<br><span>20.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=skincake">
        <img src="../assets/img/skincake.jpg" alt="Skin Cake">
      </a>
      <p>Skin Cake<br><span>15.000</span></p>
    </div>
    <div class="cake-item">
      <a href="../add_to_cart.php?id=pigcake">
        <img src="../assets/img/pigcake.jpg" alt="Pig Cake">
      </a>
      <p>Pig Cake<br><span>10.000</span></p>
    </div>
  </div>

  <!-- ✅ Bottom Navbar -->
  <div class="bottom-nav">
    <a href="../menu/index7.php" class="nav-item">
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