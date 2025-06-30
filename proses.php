<?php
// ======================================================================
// BAGIAN PHP INI SAMA SEKALI TIDAK SAYA UBAH.
// SEMUA FUNGSI, PERHITUNGAN, DAN LOGIKA SESSION ANDA 100% AMAN.
// ======================================================================
session_start();
// Path ini sudah benar berdasarkan struktur folder Anda
include '../includes/header.php';

$lokasi_list = ['Purbalingga', 'Karangasem', 'Padamara', 'Bobotsari', 'Purwokerto', 'Karangsentul', 'Banyumas', 'Ajibarang', 'Cilacap', 'Kebumen'];

if (isset($_POST['lokasi'])) {
  $_SESSION['lokasi'] = $_POST['lokasi'];
}
if (isset($_POST['diskon'])) {
  $_SESSION['diskon'] = (int)$_POST['diskon'];
}
$lokasi_dipilih = $_SESSION['lokasi'] ?? $lokasi_list[0];
$diskon_persen = $_SESSION['diskon'] ?? 0;

$produk_dibeli = $_SESSION['checkout_items'] ?? $_SESSION['cart'] ?? [];

if (isset($_POST['hapus'])) {
  $hapusIndex = (int)$_POST['hapus'];
  if (isset($produk_dibeli[$hapusIndex])) {
    unset($produk_dibeli[$hapusIndex]);
    $_SESSION['checkout_items'] = array_values($produk_dibeli);
    $produk_dibeli = $_SESSION['checkout_items'];
  }
}

$item_total = 0;
$produk_dengan_total = [];
if (!empty($produk_dibeli)) {
  foreach ($produk_dibeli as $produk) {
    $harga_produk = $produk['price'] ?? 0;
    $qty = $produk['qty'] ?? 1;
    $topping_harga = 0;
    if (isset($produk['topping']) && is_array($produk['topping'])) {
      foreach ($produk['topping'] as $t) {
        $topping_harga += 2000;
      }
    }
    $harga_size = 0;
    if (isset($produk['size'])) {
      if ($produk['size'] === 'Medium') $harga_size = 10000;
      elseif ($produk['size'] === 'Large') $harga_size = 15000;
    }
    $subtotal = ($harga_produk + $harga_size + $topping_harga) * $qty;
    $item_total += $subtotal;
    $produk_dengan_total[] = ['nama' => $produk['name'] ?? '-', 'size' => $produk['size'] ?? '-', 'topping' => $produk['topping'] ?? [], 'qty' => $qty, 'subtotal' => $subtotal];
  }
}
$potongan = ($diskon_persen / 100) * $item_total;
$total_akhir = $item_total - $potongan;

$_SESSION['checkout'] = []; 
foreach ($produk_dengan_total as $produk) {
  $_SESSION['checkout'][] = ['produk' => $produk['nama'], 'size' => $produk['size'], 'topping' => implode(', ', $produk['topping']), 'harga' => ($produk['subtotal'] / $produk['qty']), 'qty' => $produk['qty']];
}
$_SESSION['total_akhir'] = $total_akhir;
$_SESSION['promo'] = $potongan;
// ======================================================================
// AKHIR DARI BAGIAN PHP YANG TIDAK DIUBAH
// ======================================================================
?>

<style>
  .checkout-page {
    min-height: 100vh;
    /* Path ini sudah benar berdasarkan struktur folder Anda */
    background: url('../assets/img/bg-checkout.jpg') no-repeat center center;
    background-size: cover;
    padding: 20px;
    font-family: 'Segoe UI', sans-serif;
  }
  .checkout-container {
    max-width: 450px;
    margin: 0 auto;
  }
  .checkout-container h2 {
    text-align: center;
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 25px;
  }

  /* Section Styles */
  .section {
    margin-bottom: 20px;
  }
  .section-label {
    display: block;
    font-weight: 600;
    color: #444;
    margin-bottom: 8px;
  }
  
  /* Location Select */
  .location-select {
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
  }

  /* Item Card */
  .item-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(247, 247, 247, 0.9);
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 8px;
  }
  .item-details strong { font-size: 16px; }
  .item-details small { color: #555; }
  .delete-button { background: none; border: none; padding: 0; cursor: pointer; }
  .delete-button img { width: 24px; height: 24px; }

  /* Promo Options */
  .promo-options label {
    margin-right: 15px;
  }

  /* Summary Box */
  .summary-box {
    background: rgba(255, 245, 230, 0.95);
    padding: 15px;
    border-radius: 10px;
    margin-top: 20px;
  }
  .summary-box p {
    margin: 8px 0;
    display: flex;
    justify-content: space-between;
  }
  .summary-box hr {
    border: 0;
    border-top: 1px solid #e0e0e0;
    margin: 10px 0;
  }

  /* Checkout Button */
  .checkout-button-container {
    text-align: center;
    margin-top: 25px;
  }
  .btn-checkout {
    background: #4b2c20;
    color: white;
    padding: 12px 40px;
    border-radius: 10px;
    border: none;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
  }
  .empty-cart-message {
    text-align: center;
    padding: 40px;
    background: rgba(255,255,255,0.8);
    border-radius: 10px;
  }
</style>

<div class="checkout-page">
  <div class="checkout-container">
    <h2>Checkout</h2>
    
    <!-- ================== PERBAIKAN DI SINI ================== -->
    <!-- Menambahkan action="" agar form submit ke halaman ini sendiri -->
    <form method="POST" id="checkout-form" action="">
    <!-- ======================================================== -->
    
      <!-- Lokasi Pengiriman -->
      <div class="section">
        <label for="lokasi" class="section-label">📍 Lokasi Pengiriman:</label>
        <select name="lokasi" class="location-select" onchange="document.getElementById('checkout-form').submit();">
          <?php foreach ($lokasi_list as $lok): ?>
            <option value="<?= htmlspecialchars($lok) ?>" <?= $lokasi_dipilih == $lok ? 'selected' : '' ?>><?= htmlspecialchars($lok) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <?php if (!empty($produk_dengan_total)): ?>
        <!-- Daftar Item -->
        <div class="section">
          <?php foreach ($produk_dengan_total as $i => $produk): ?>
            <div class="item-card">
              <div class="item-details">
                <strong><?= htmlspecialchars($produk['nama']) ?>, <?= htmlspecialchars($produk['size']) ?></strong><br>
                <small><?= !empty($produk['topping']) ? htmlspecialchars(implode(', ', $produk['topping'])) : 'Tanpa Topping' ?> x <?= $produk['qty'] ?> → <strong>Total: Rp <?= number_format($produk['subtotal'], 0, ',', '.') ?></strong></small>
              </div>
              <button type="submit" name="hapus" value="<?= $i ?>" class="delete-button">
                <!-- Path ini sudah benar berdasarkan struktur folder Anda -->
                <img src="../assets/img/icon-sampah.png" alt="Hapus">
              </button>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Diskon -->
        <div class="section promo-options">
          <label class="section-label">🏡 Pilih Promo Diskon:</label><br>
          <label><input type="radio" name="diskon" value="3" <?= $diskon_persen==3?'checked':'' ?> onchange="this.form.submit();"> 3%</label>
          <label><input type="radio" name="diskon" value="5" <?= $diskon_persen==5?'checked':'' ?> onchange="this.form.submit();"> 5%</label>
          <label><input type="radio" name="diskon" value="10" <?= $diskon_persen==10?'checked':'' ?> onchange="this.form.submit();"> 10%</label>
        </div>

        <!-- Ringkasan -->
        <div class="summary-box">
          <p><span>Item Total:</span> <span>Rp <?= number_format($item_total, 0, ',', '.') ?></span></p>
          <p><span>Promotion:</span> <span>- Rp <?= number_format($potongan, 0, ',', '.') ?></span></p>
          <hr>
          <p><strong>Total:</strong> <strong>Rp <?= number_format($total_akhir, 0, ',', '.') ?></strong></p>
        </div>

        <!-- Tombol Checkout -->
        <div class="checkout-button-container">
          <!-- Path ini sudah benar berdasarkan struktur folder Anda -->
          <button type="submit" formaction="../pembayaran/index8.php" class="btn-checkout">CHECKOUT</button>
        </div>

      <?php else: ?>
        <p class="empty-cart-message">Keranjang kosong.</p>
      <?php endif; ?>
    </form>
  </div>
</div>

<?php 
// Path ini sudah benar berdasarkan struktur folder Anda
include '../includes/footer.php'; 
?>