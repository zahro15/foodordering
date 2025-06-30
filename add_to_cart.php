<?php
session_start();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $produkList = [
    'poundcake' => ['name' => 'Pound Cake', 'price' => 10000, 'img' => 'assets/img/poundcake.jpg'],
    'buttercake' => ['name' => 'Butter Cake', 'price' => 15000, 'img' => 'assets/img/butter-cake.jpg'],
    'sponge' => ['name' => 'Sponge Cake', 'price' => 20000, 'img' => 'assets/img/sponge.jpg'],
    'skincake' => ['name' => 'Skin Cake', 'price' => 20000, 'img' => 'assets/img/skincake.jpg'],
    'floating' => ['name' => 'Floating Cake', 'price' => 25000, 'img' => 'assets/img/cake2.jpg'],
    'pigcake' => ['name' => 'Pig Cake', 'price' => 10000, 'img' => 'assets/img/pigcake.jpg'],
    'cakelove' => ['name' => 'Cake Love', 'price' => 15000, 'img' => 'assets/img/cakelove.jpg'],
    'oreo' => ['name' => 'Oreo', 'price' => 20000, 'img' => 'assets/img/cakeoreo.jpg'],
    'roolcake' => ['name' => 'Rool Cake', 'price' => 20000, 'img' => 'assets/img/roolcake.jpeg'],
  ];

  if (isset($produkList[$id])) {
    $produk = $produkList[$id];

    // ✅ Tambahkan ID agar bisa dipakai di detail
    $produk['id'] = $id;

    $produk['qty'] = 1;
    $produk['size'] = '-';
    $produk['topping'] = [];

    $_SESSION['cart'][] = $produk;
  }
}

header('Location: keranjang/index6.php');
exit;
