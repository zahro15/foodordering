<?php
session_start();
include '../includes/header.php';

// Proses hapus item dari keranjang
if (isset($_GET['hapus'])) {
  $index = $_GET['hapus'];
  if (isset($_SESSION['cart'][$index])) {
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset urutan index
  }
}
?>

<div class="background"></div>

<div class="keranjang-page" style="padding: 20px;">
  <h2>Keranjang Belanja</h2>

  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <div class="keranjang-list">
      <?php foreach ($_SESSION['cart'] as $i => $produk): ?>
        <div class="keranjang-item" style="display: flex; margin-bottom: 15px; align-items: center; position: relative; background: #fff7f0; border-radius: 10px; padding: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
          <img src="../<?= $produk['img'] ?>" alt="<?= $produk['name'] ?>" style="width: 80px; height: 80px; border-radius: 8px; margin-right: 15px; border: 1px solid #ccc;" />
          <div class="info">
            <strong><?= $produk['name'] ?></strong><br>
            <span>Harga: Rp <?= number_format($produk['price'], 0, ',', '.') ?></span><br>
            <!-- Tombol Beli -->
            <a href="../toping/detail.php?produk=<?= strtolower(str_replace(' ', '', $produk['name'])) ?>"
              style="display:inline-block; margin-top:5px; padding:4px 8px; background:#4b2c20; color:white; border-radius:6px; font-size:12px; text-decoration:none;">
              🧁 Beli
            </a>
          </div>
          <!-- Tombol Hapus -->
          <a href="index.php?hapus=<?= $i ?>" style="position: absolute; top: 0; right: 0;">
            <img src="../assets/img/icon-sampah.png" alt="Hapus" style="width: 24px; height: 24px; margin-left: 10px;">
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p>Keranjang masih kosong</p>
  <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
