<?php
session_start();
include '../includes/db.php';
include '../includes/header.php';

date_default_timezone_set('Asia/Jakarta');

$produk_dibeli = $_SESSION['checkout_items'] ?? [];

// Selalu prioritaskan total_akhir dari sesi, karena sudah dipotong promo.
$total_bayar = $_SESSION['total_akhir'] ?? 0;

// Logika fallback jika total_akhir tidak ada di session (misal akses langsung)
if ($total_bayar == 0 && !empty($produk_dibeli)) {
  foreach ($produk_dibeli as $produk) {
    $harga = $produk['price'] ?? 0;
    $qty = $produk['qty'] ?? 1;
    $size = $produk['size'] ?? '';
    $topping = isset($produk['topping']) ? count($produk['topping']) * 2000 : 0;
    $harga_size = $size === 'Medium' ? 10000 : ($size === 'Large' ? 15000 : 0);
    $subtotal = ($harga + $harga_size + $topping) * $qty;
    $total_bayar += $subtotal;
  }
}

$notifikasi = '';
$showNext = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['metode'])) {
  $metode = $_POST['metode'] ?? '';
  $bank = $_POST['bank'] ?? null;
  $angka_tf = $_POST['angka_tf'] ?? null;
  $waktu = date('Y-m-d H:i:s');

  if ($metode === 'Transfer' && (!is_numeric($angka_tf) || strlen($angka_tf) > 5)) {
    $notifikasi = '❌ PIN transfer harus angka dan maksimal 5 digit.';
  } else {
    $total_final_untuk_db = $total_bayar; 
    $detail_pesanan = [];
    foreach ($produk_dibeli as $produk) {
      $detail_pesanan[] = "{$produk['name']} (x{$produk['qty']})";
    }
    $nama_produk_db = implode(', ', $detail_pesanan);

    $stmt = $conn->prepare("INSERT INTO pembayaran (nama_produk, total, metode, bank, angka_tf, waktu) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssss", $nama_produk_db, $total_final_untuk_db, $metode, $bank, $angka_tf, $waktu);
    $stmt->execute();
    
    $notifikasi = ($metode === 'Cash')
      ? '✅ Pembayaran Cash diproses. Menunggu pembayaran di tempat.'
      : '✅ Pembayaran Transfer berhasil. Mohon tunggu pesanan.';
    
    $showNext = true;
    $_SESSION['metode'] = $metode;
    
    // !!! PENTING: BAGIAN UNSET SUDAH DIHAPUS DARI SINI !!!
    // Proses hapus data dipindahkan ke halaman struk (`pengiriman/index.php`)
    // agar data bisa ditampilkan dulu di struk.
  }
}
?>

<!-- KODE HTML, CSS, DAN JAVASCRIPT DI BAWAH INI SAMA SEKALI TIDAK PERLU DIUBAH -->
<style>
  :root {
    --primary-color: #4b2c20;
    --primary-light: #603a28;
    --secondary-color: #f7f2f0;
    --success-color: #28a745;
    --error-color: #dc3545;
    --border-color: #ddd;
    --text-dark: #333;
    --text-light: #777;
  }
  .pembayaran-page {
    min-height: 100vh;
    background: url('../assets/img/begrondasar.jpg') no-repeat center center;
    background-size: cover;
    background-attachment: fixed;
    font-family: 'Segoe UI', 'Poppins', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }
  .payment-card {
    background-color: #ffffff;
    padding: 25px 30px;
    border-radius: 20px;
    max-width: 450px;
    width: 100%;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    animation: fadeIn 0.5s ease-out;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .payment-card h2 {
    text-align: center;
    margin: 0 0 10px 0;
    color: var(--primary-color);
    font-size: 28px;
    font-weight: 700;
  }
  .total-section {
    background-color: var(--secondary-color);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    margin-bottom: 25px;
  }
  .total-section label {
    color: var(--text-light);
    font-size: 14px;
    margin: 0;
  }
  .total-section .amount {
    color: var(--primary-color);
    font-size: 32px;
    font-weight: 700;
    letter-spacing: -1px;
    margin: 0;
  }
  .method-options {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 20px;
  }
  .method-option { position: relative; }
  .method-option input[type="radio"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
  }
  .method-content {
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    transition: all 0.2s ease;
  }
  .method-content .icon { font-size: 24px; }
  .method-content .name { font-weight: 600; color: var(--text-dark); margin-top: 5px; }
  .method-option input[type="radio"]:checked + .method-content {
    border-color: var(--primary-color);
    background-color: var(--secondary-color);
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(75, 44, 32, 0.1);
  }
  #transferDetails {
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    transition: max-height 0.4s ease-out, opacity 0.3s ease-out, margin-top 0.4s ease-out;
  }
  #transferDetails.visible {
    max-height: 300px;
    opacity: 1;
    margin-top: 20px;
  }
  .form-group { margin-bottom: 15px; }
  .form-group label {
    display: block;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 6px;
  }
  .form-group select, .form-group input {
    width: 100%;
    padding: 12px 15px;
    border-radius: 8px;
    border: 1px solid var(--border-color);
    font-size: 16px;
  }
  .form-group input:focus, .form-group select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(75, 44, 32, 0.1);
  }
  .btn-submit {
    background-color: var(--primary-color);
    color: white;
    padding: 15px;
    border: none;
    border-radius: 12px;
    margin-top: 15px;
    width: 100%;
    font-weight: 700;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.2s ease, transform 0.2s ease;
  }
  .btn-submit:hover {
    background-color: var(--primary-light);
    transform: translateY(-2px);
  }
  .back-link-container {
    text-align: center;
    margin-top: 20px;
  }
  .back-link {
    color: var(--text-light);
    text-decoration: none;
    font-weight: 500;
    font-size: 15px;
    transition: color 0.2s ease;
  }
  .back-link:hover {
    color: var(--primary-color);
    text-decoration: underline;
  }
  .notif {
    padding: 15px;
    margin-top: 20px;
    border-radius: 12px;
    text-align: center;
    font-weight: 600;
    animation: fadeIn 0.5s;
  }
  .notif.success { background-color: #eaf6ec; color: #2a6f3b; }
  .notif.error { background-color: #fdeaea; color: #a92323; }
  .next-btn-container { text-align: center; margin-top: 15px; }
  a.next-btn {
    display: inline-block;
    padding: 12px 25px;
    background-color: var(--success-color);
    color: white;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.2s ease;
  }
  a.next-btn:hover { background-color: #218838; }
</style>

<div class="pembayaran-page">
  <div class="payment-card">
    <h2>Detail Pembayaran</h2>
    <div class="total-section">
      <label>Total Pembayaran</label>
      <p class="amount">Rp <?= number_format($total_bayar, 0, ',', '.') ?></p>
    </div>
    <form method="POST">
      <label class="form-group-title" style="font-weight: 600; display: block; margin-bottom: 10px;">Pilih Metode Pembayaran:</label>
      <div class="method-options">
        <label class="method-option">
          <input type="radio" name="metode" value="Cash" onclick="toggleTransfer(false)" required>
          <div class="method-content">
            <div class="icon">💵</div>
            <div class="name">Bayar di Tempat</div>
          </div>
        </label>
        <label class="method-option">
          <input type="radio" name="metode" value="Transfer" onclick="toggleTransfer(true)">
          <div class="method-content">
            <div class="icon">💳</div>
            <div class="name">Transfer Bank</div>
          </div>
        </label>
      </div>
      <div id="transferDetails">
        <div class="form-group">
          <label for="bank">Pilih Bank</label>
          <select name="bank" id="bank">
            <option value="BCA">BCA</option>
            <option value="BRI">BRI</option>
            <option value="BNI">BNI</option>
            <option value="Mandiri">Mandiri</option>
          </select>
        </div>
        <div class="form-group">
          <label for="angka_tf">No. Rekening / PIN</label>
          <input type="text" name="angka_tf" id="angka_tf" placeholder="Masukkan 5 digit PIN" maxlength="5" pattern="\d{1,5}" inputmode="numeric">
        </div>
      </div>
      <button type="submit" class="btn-submit">Bayar Sekarang</button>
    </form>
    <div class="back-link-container">
      <a href="../checkout/index3.php" class="back-link">❮ Kembali ke Checkout</a>
    </div>
    <?php if ($notifikasi): ?>
      <div class="notif <?= strpos($notifikasi, '❌') !== false ? 'error' : 'success' ?>">
        <?= $notifikasi ?>
      </div>
      <?php if ($showNext): ?>
        <div class="next-btn-container">
          <a class="next-btn" href="../pengiriman/index9.php">🚚 Lanjut ke Status Pengiriman</a>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>

<script>
function toggleTransfer(show) {
  const transferForm = document.getElementById('transferDetails');
  if (show) {
    transferForm.classList.add('visible');
  } else {
    transferForm.classList.remove('visible');
  }
}
</script>

<?php include '../includes/footer.php'; ?>