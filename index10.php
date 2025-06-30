<?php 
session_start();
include '../includes/header.php'; 

// ==========================================================
// LOGIKA PENGAMBILAN DATA YANG SUDAH BENAR
// ==========================================================
$items_di_struk = $_SESSION['checkout_items'] ?? []; 
$potongan_promo = $_SESSION['promo'] ?? 0;
$total_final = $_SESSION['total_akhir'] ?? 0;
$lokasi = $_SESSION['lokasi'] ?? 'Tidak Diketahui';

// Hitung Item Total (subtotal sebelum diskon) untuk ditampilkan di ringkasan
$item_total = $total_final + $potongan_promo;
// ==========================================================
?>

<style>
  :root {
    --primary-color: #6b3f1d;
    --secondary-color: #f3e5dc;
    --card-bg: #ffffff;
    --text-dark: #333;
    --text-light: #777;
    --promo-color: #27ae60;
    --star-color: #f6b900;
  }
  body {
    background: url('../assets/img/begrondasar.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Segoe UI', 'Poppins', sans-serif;
  }
  .struk-page {
    padding: 20px 15px 100px 15px;
  }
  .struk-container {
    max-width: 450px;
    margin: 0 auto;
    background-color: var(--card-bg);
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    padding: 20px;
  }
  .struk-header {
    display: flex; align-items: center; margin-bottom: 25px;
  }
  .struk-title {
    flex-grow: 1; text-align: center; font-size: 20px; font-weight: 700; color: var(--text-dark); margin: 0;
  }
  /* Mengembalikan Info Driver */
  .driver-info-card {
    display: flex; justify-content: space-between; align-items: center;
    background-color: #f9f9f9;
    padding: 12px 15px; border-radius: 15px; margin-bottom: 20px;
  }
  .driver-details { display: flex; align-items: center; gap: 12px; }
  .driver-avatar { width: 40px; height: 40px; }
  .driver-name { font-weight: 600; }
  .driver-rating { color: var(--star-color); font-weight: bold; font-size: 14px; }
  .call-button {
    background-color: rgba(228, 76, 60, 0.1);
    border: none; width: 40px; height: 40px; border-radius: 50%;
    font-size: 18px; cursor: pointer; color: #e74c3c;
  }
  /* Mengembalikan Status Pengiriman */
  .delivery-status {
    text-align: center; font-weight: 600; color: var(--primary-color);
    background-color: var(--secondary-color);
    padding: 12px; border-radius: 12px; margin-bottom: 25px;
  }
  .order-summary {
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-bottom: 1px dashed #ccc;
  }
  .order-item {
    display: flex; justify-content: space-between; align-items: flex-start;
    margin-bottom: 12px; font-size: 15px;
  }
  .item-name-details {
    color: var(--text-dark); font-weight: 600;
  }
  .item-name-details .item-extras {
    display: block; font-size: 13px; color: var(--text-light); font-weight: normal; padding-left: 10px;
  }
  .item-price-qty {
    color: var(--text-dark); text-align: right; white-space: nowrap;
  }
  .cost-summary { margin-bottom: 30px; }
  .summary-line {
    display: flex; justify-content: space-between;
    margin-bottom: 10px; font-size: 16px;
  }
  .summary-line.total {
    font-size: 20px; font-weight: 700; color: var(--text-dark);
  }
  /* Mengembalikan Tombol-tombol Aksi */
  .action-buttons { display: flex; flex-direction: column; gap: 12px; }
  .btn {
    width: 100%; padding: 15px; border-radius: 12px;
    font-size: 16px; font-weight: 700; cursor: pointer; border: none;
  }
  .btn-done { background-color: var(--primary-color); color: white; }
  .thank-you-message {
    background-color: var(--secondary-color);
    color: var(--primary-color); text-align: center;
    cursor: default; /* agar tidak terlihat seperti tombol */
  }
</style>

<div class="struk-page">
  <div class="struk-container">
    
    <div class="struk-header">
      <!-- Back button tidak perlu karena ini halaman akhir -->
      <h2 class="struk-title">Status Pengiriman</h2>
    </div>

    <!-- SEMUA ELEMEN VISUAL DIKEMBALIKAN -->
    <div class="driver-info-card">
      <div class="driver-details">
        <img src="../assets/img/icon-driver.png" alt="Driver Icon" class="driver-avatar">
        <div>
          <strong class="driver-name">Slamet A</strong><br>
          <span class="driver-rating">⭐ 4,8 / 5</span>
        </div>
      </div>
      <a href="tel:+628123456789" class="call-button" style="text-decoration: none; display: flex; justify-content: center; align-items: center;">📞</a>
    </div>
    
    <!-- AKHIR ELEMEN VISUAL YANG DIKEMBALIKAN -->

    <div class="order-summary">
      <h3 style="font-weight: 600; color: #333; margin-top:0; margin-bottom: 15px;">Detail Pesanan</h3>
      <?php if (!empty($items_di_struk)): ?>
        <?php foreach ($items_di_struk as $item): 
          // Hitung subtotal per item untuk ditampilkan
          $harga_produk = $item['price'] ?? 0;
          $qty = $item['qty'] ?? 1;
          $topping_harga = isset($item['topping']) ? count($item['topping']) * 2000 : 0;
          $harga_size = 0;
          if (isset($item['size'])) {
            if ($item['size'] === 'Medium') $harga_size = 10000;
            elseif ($item['size'] === 'Large') $harga_size = 15000;
          }
          $subtotal_item = ($harga_produk + $harga_size + $topping_harga);
        ?>
          <div class="order-item">
            <div class="item-name-details">
              <?= htmlspecialchars($item['name']) ?>
              <span class="item-extras">
                <?= htmlspecialchars($item['size']) ?>, 
                <?= !empty($item['topping']) ? htmlspecialchars(implode(', ', $item['topping'])) : 'Tanpa Topping' ?>
              </span>
            </div>
            <span class="item-price-qty">
              Rp <?= number_format($subtotal_item, 0, ',', '.') ?> x<?= $qty ?>
            </span>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align:center;">Tidak ada data pesanan.</p>
      <?php endif; ?>
    </div>

    <div class="cost-summary">
       <div class="summary-line">
        <span>Subtotal</span>
        <span>Rp <?= number_format($item_total, 0, ',', '.') ?></span>
      </div>
      <div class="summary-line">
        <span>Diskon Promo</span>
        <span style="color: var(--promo-color); font-weight: 600;">- Rp <?= number_format($potongan_promo, 0, ',', '.') ?></span>
      </div>
      <hr style="border:none; border-top: 1px solid #eee; margin: 10px 0;">
      <div class="summary-line total">
        <span>Total Akhir</span>
        <span>Rp <?= number_format($total_final, 0, ',', '.') ?></span>
      </div>
    </div>

    <!-- TOMBOL AKSI DIKEMBALIKAN SESUAI PERMINTAAN -->
    <div class="action-buttons">
      <button class="btn btn-done" onclick="window.location.href='../sukses/index11.php'">PESANAN DITERIMA</button>
      <div class="btn thank-you-message">Terima kasih telah berbelanja!</div>
    </div>

  </div>
</div>

<?php 
// SETELAH STRUK DITAMPILKAN, BARULAH SEMUA DATA TRANSAKSI DIHAPUS
unset($_SESSION['cart'], $_SESSION['checkout_items'], $_SESSION['total_akhir'], $_SESSION['promo'], $_SESSION['metode'], $_SESSION['lokasi']);

include '../includes/footer.php'; 
?>