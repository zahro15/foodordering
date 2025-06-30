<?php
session_start();
include '../includes/header.php';

// Logika hapus (sudah benar, tidak diubah)
if (isset($_GET['hapus'])) {
  $index = $_GET['hapus'];
  if (isset($_SESSION['cart'][$index])) {
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); 
    header("Location: index6.php");
    exit();
  }
}
?>

<style>
/* CSS tidak diubah */
.back-icon {
  position: absolute;
  top: 20px;
  left: 20px;
  z-index: 99;
  background-color: rgba(255, 255, 255, 0.8);
  padding: 6px;
  border-radius: 12px;
}
.back-icon img {
  width: 28px;
  height: 28px;
}
</style>

<div class="background"></div>

<a href="../menu/index7.php" class="back-icon">
  <img src="../assets/img/icon-kembali.png" alt="Back">
</a>

<div class="keranjang-page" style="padding: 20px; padding-top: 60px;">
  <h2>Keranjang Saya</h2>

  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <div class="keranjang-list">
      <?php foreach ($_SESSION['cart'] as $i => $produk): ?>
        <div class="keranjang-item" style="display: flex; margin-bottom: 15px; align-items: center; position: relative; background: #fff7f0; border-radius: 10px; padding: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
          
          <img src="../<?= $produk['img'] ?>" alt="<?= htmlspecialchars($produk['name']) ?>" style="width: 80px; height: 80px; border-radius: 8px; margin-right: 15px; border: 1px solid #ccc;" />
          
          <div class="info">
            <strong><?= htmlspecialchars($produk['name']) ?></strong><br>
            <span>Rp <?= number_format($produk['price'], 0, ',', '.') ?></span><br>

            <!-- =============================================== -->
            <!-- ===== INI DIA PERBAIKANNYA ADA DI SINI ===== -->
            <!-- =============================================== -->
            <?php
              // 1. Ambil nama lengkap produk
              $nama_lengkap = $produk['name'];
              // 2. Siapkan variabel untuk menampung kunci URL yang benar
              $produk_key_url = '';

              // 3. "Terjemahkan" nama lengkap menjadi kunci URL yang benar
              switch ($nama_lengkap) {
                  case 'Pound Cake': $produk_key_url = 'poundcake'; break;
                  case 'Butter Cake': $produk_key_url = 'buttercake'; break;
                  case 'Sponge Cake': $produk_key_url = 'sponge'; break; // <- INI PERBAIKANNYA
                  case 'Skin Cake': $produk_key_url = 'skincake'; break;
                  case 'Floating Cake': $produk_key_url = 'floating'; break; // <- DAN INI
                  case 'Pig Cake': $produk_key_url = 'pigcake'; break;
                  case 'Cake Love': $produk_key_url = 'cakelove'; break;
                  case 'Oreo': $produk_key_url = 'oreo'; break;
                  case 'Rool Cake': $produk_key_url = 'roolcake'; break;
                  // Jika ada produk baru, tambahkan di sini
                  default:
                      // Untuk jaga-jaga jika ada produk yang namanya tidak ada di daftar
                      $produk_key_url = strtolower(str_replace(' ', '', $nama_lengkap));
                      break;
              }
            ?>
            
            <!-- 4. Gunakan kunci yang sudah benar di dalam link -->
            <a href="../toping/detail.php?produk=<?= $produk_key_url ?>"
              style="display:inline-block; margin-top:5px; padding:4px 8px; background:#4b2c20; color:white; border-radius:6px; font-size:12px; text-decoration:none;">
              🧁 Beli
            </a>
            <!-- =============================================== -->
            
          </div>
          
          <!-- Tombol Hapus (sudah benar) -->
          <a href="index6.php?hapus=<?= $i ?>" style="position: absolute; top: 5px; right: 5px;">
            <img src="../assets/img/icon-sampah.png" alt="Hapus" style="width: 24px; height: 24px; margin-left: 10px;">
          </a>

        </div>
      <?php endforeach; ?>
    </div>

  <?php else: ?>
    <p style="text-align:center;">Keranjang masih kosong. Yuk, belanja dulu!</p>
  <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>