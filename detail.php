<?php
session_start();
include '../includes/header.php';

// Tangkap data dari URL
$produk = isset($_GET['produk']) ? $_GET['produk'] : 'buttercake';
$produkList = [
  'poundcake' => ['name' => 'Pound Cake', 'price' => 10000, 'img' => 'poundcake.jpg'],
  'buttercake' => ['name' => 'Butter Cake', 'price' => 15000, 'img' => 'butter-cake.jpg'],
  'sponge' => ['name' => 'Sponge Cake', 'price' => 20000, 'img' => 'sponge.jpg'],
  'skincake' => ['name' => 'Skin Cake', 'price' => 20000, 'img' => 'skincake.jpg'],
  'floating' => ['name' => 'Floating Cake', 'price' => 25000, 'img' => 'cake2.jpg'],
  'pigcake' => ['name' => 'Pig Cake', 'price' => 10000, 'img' => 'pigcake.jpg'],
  'cakelove' => ['name' => 'Cake Love', 'price' => 15000, 'img' => 'cakelove.jpg'],
  'oreo' => ['name' => 'Oreo', 'price' => 20000, 'img' => 'cakeoreo.jpg'],
  'roolcake' => ['name' => 'Rool Cake', 'price' => 20000, 'img' => 'roolcake.jpeg'],
];

// Pastikan produk tersedia
if (!isset($produkList[$produk])) {
  echo "<p>Produk tidak ditemukan</p>";
  exit;
}

$produkData = $produkList[$produk];
$produk_nama = $produkData['name'];
$produk_img = $produkData['img'];
$harga = $produkData['price'];
?>

<div class="background"></div>

<section class="detail-section" style="padding: 30px;">
  <div class="detail-header" style="display: flex; gap: 20px; align-items: center;">
    <img src="../assets/img/<?php echo $produk_img; ?>" alt="<?php echo $produk_nama; ?>" class="detail-img" style="width: 130px; height: 130px; border-radius: 12px; object-fit: cover;">
    <div class="detail-title" style="display: flex; flex-direction: column; align-items: flex-start;">
      <h2 style="margin: 0 0 5px 0; font-size: 22px;">🧁 <?php echo $produk_nama; ?></h2>
      <span class="detail-price" style="font-size: 22px; color: #4b2c20;">Rp <?php echo number_format($harga, 0, ',', '.'); ?></span>
    </div>
  </div>

  <p style="margin-top: 20px; background: #fff3e6; padding: 10px 15px; border-left: 5px solid #d88d3f; border-radius: 8px;">
    👉 Jangan lupa pilih size dan topping yahh sebelum di checkout! Pemilihan topping tambah Rp 2.000 yahh..
  </p>

  <form method="POST" action="" style="margin-top: 25px;">
    <h3 style="color: #4b2c20;">📏 Pilih Size</h3>
    <div class="size-options" style="display: flex; gap: 15px; margin-bottom: 20px;">
      <label><input type="radio" name="size" value="Small"> Small</label>
      <label><input type="radio" name="size" value="Medium"> Medium (Rp 10.000)</label>
      <label><input type="radio" name="size" value="Large"> Large (Rp 15.000)</label>
    </div>

    <h3 style="color: #4b2c20;">🍒 Pilih Topping</h3>
    <div class="topping-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-bottom: 25px;">
      <label style="background: #f5f5f5; padding: 10px; border-radius: 10px;"><input type="checkbox" name="topping[]" value="Choco"> 🍫 Choco </label>
      <label style="background: #f5f5f5; padding: 10px; border-radius: 10px;"><input type="checkbox" name="topping[]" value="Chip"> 🍪 Chip </label>
      <label style="background: #f5f5f5; padding: 10px; border-radius: 10px;"><input type="checkbox" name="topping[]" value="Cerry"> 🍒 Cerry </label>
      <label style="background: #f5f5f5; padding: 10px; border-radius: 10px;"><input type="checkbox" name="topping[]" value="Oreo"> 🟤 Oreo </label>
    </div>

    <div class="order-footer" style="display: flex; justify-content: space-between; align-items: center;">
      <div class="quantity-control" style="display: flex; align-items: center; gap: 10px;">
        <button type="button" onclick="updateQty(-1)" style="padding: 5px 10px;">-</button>
        <input type="text" name="qty" id="qty" value="1" readonly style="width:30px; text-align:center;">
        <button type="button" onclick="updateQty(1)" style="padding: 5px 10px;">+</button>
      </div>
      <button type="submit" name="submit" class="order-button" style="background-color: #4b2c20; color: white; padding: 10px 20px; border-radius: 8px; border: none;">
        ➕ Add to Order
      </button>
    </div>
  </form>
</section>

<script>
  function updateQty(change) {
    var qty = document.getElementById('qty');
    var current = parseInt(qty.value);
    if (current + change >= 1) {
      qty.value = current + change;
    }
  }
</script>

<?php
if (isset($_POST['submit'])) {
  $size = $_POST['size'] ?? '';
  $topping = $_POST['topping'] ?? [];
  $qty = $_POST['qty'] ?? 1;

  $data = [
    'name' => $produk_nama,
    'img' => "assets/img/$produk_img",
    'price' => (int)$harga,
    'size' => $size,
    'topping' => $topping,
    'qty' => (int)$qty
  ];

  if (!isset($_SESSION['checkout_items'])) {
    $_SESSION['checkout_items'] = [];
  }
  $_SESSION['checkout_items'][] = $data;

  echo "<script>window.location.href='../checkout/index3.php';</script>";
}

include '../includes/footer.php';
?>
