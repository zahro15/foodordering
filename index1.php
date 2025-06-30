<?php include '../includes/header.php'; ?>

<style>
/* Gaya Dasar */
body {
  transition: background-color 0.3s, color 0.3s;
}

.akun-page {
  min-height: 100vh;
  background: url('../assets/img/begrondasar.jpg') no-repeat center center;
  background-size: cover;
  background-attachment: fixed;
  font-family: 'Segoe UI', sans-serif;
  padding: 20px;
  box-sizing: border-box;
  padding-bottom: 100px;
}

.akun-box {
  max-width: 450px;
  margin: auto;
  text-align: center;
  background-color: #fef5e7;
  padding: 20px;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  transition: background-color 0.3s, color 0.3s;
}

.akun-box h2 {
  margin-bottom: 16px;
  color: #4b2c20;
  transition: color 0.3s;
}

.user-icon img {
  width: 70px;
  margin-bottom: 8px;
}

#userName {
  font-size: 1.2em;
  font-weight: bold;
  color: #4b2c20;
  margin-top: 0;
  margin-bottom: 16px;
  transition: color 0.3s;
}

.stats-box {
  display: flex;
  justify-content: space-around;
  background-color: #4b2c20;
  color: white;
  padding: 10px 0;
  border-radius: 10px;
  margin-bottom: 20px;
  font-weight: bold;
  transition: background-color 0.3s;
}

.akun-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  text-align: left;
}

.akun-menu li {
  padding: 12px 0;
  border-bottom: 1px solid #ddd;
  transition: border-color 0.3s;
}

.akun-menu li a {
  display: flex;
  align-items: center;
  color: #4b2c20;
  font-weight: 500;
  text-decoration: none;
  transition: color 0.3s;
}

.akun-menu li a i {
  margin-right: 15px;
  font-style: normal;
  width: 20px;
  text-align: center;
}

.kembali-btn {
  background-color: #4b2c20;
  color: white;
  padding: 10px 20px;
  border-radius: 10px;
  border: none;
  font-weight: bold;
  display: block;
  margin: 30px auto 20px;
  cursor: pointer;
  text-align: center;
}

.bottom-navbar {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: #fff5ee;
  border-top: 1px solid #ccc;
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 6px 0 10px;
  z-index: 999;
}

.bottom-navbar a {
  text-decoration: none;
  color: #4b2c20;
  font-size: 12px;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.bottom-navbar .nav-icon {
  width: 24px;
  height: 24px;
  margin-bottom: 4px;
}

/* Gaya untuk Mode Gelap */
body.dark-mode .akun-box {
    background-color: #4b2c20;
}
body.dark-mode .akun-box h2,
body.dark-mode #userName,
body.dark-mode .akun-menu li a {
    color: #fef5e7;
}
body.dark-mode .stats-box {
    background-color: #2c1a13;
}
body.dark-mode .akun-menu li {
    border-bottom-color: #6a4a3a;
}
</style>

<div class="akun-page">
  <div class="akun-box">
    <h2>Akun Saya</h2>
    <div class="user-icon">
      <img src="../assets/img/icon-woman.png" alt="User">
    </div>
    <h3 id="userName">Nama Pengguna</h3>

    <div class="stats-box">
      <div>25<br><small>Pesanan</small></div>
      <div>1215<br><small>Poin</small></div>
    </div>

    <!-- ===== MENU AKUN SUDAH DIPERBAIKI SEMUA ===== -->
    <ul class="akun-menu">
      <li>
        <a href="#" id="changeNameLink">
          <i>👤</i>
          <span>Membership</span>
        </a>
      </li>
      <li>
        <!-- Ini akan membuka aplikasi TELEPON -->
        <a href="tel:+6282182440102">
          <i>💬</i> <!-- Ikon telepon -->
          <span>Notifications (WhatsApp)</span>
        </a>
      </li>
      <li>
        <a href="../bantuan/index.php">
          <i>❓</i>
          <span>Pusat Bantuan</span>
        </a>
      </li>
      <li>
        <a href="#" id="toggleDarkMode">
          <i>🌙</i>
          <span>Mode Gelap</span>
        </a>
      </li>
    </ul>
    <!-- ===== AKHIR MENU ===== -->
  </div>

  <button class="kembali-btn" onclick="window.location.href='../index.php'">← Kembali</button>
</div>

<div class="bottom-navbar">
  <a href="../menu/index7.php">
    <img src="../assets/img/icon-home.png" class="nav-icon" alt="Explore">
    <span>Explore</span>
  </a>
  <a href="../keranjang/index6.php">
    <img src="../assets/img/icon-order.png" class="nav-icon" alt="Order">
    <span>Order</span>
  </a>
  <a href="../akun/index1.php">
    <img src="../assets/img/icon-akun.png" class="nav-icon" alt="Akun">
    <span>Akun</span>
  </a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const userNameElement = document.getElementById('userName');
  const changeNameLink = document.getElementById('changeNameLink');

  const savedName = localStorage.getItem('userName');
  if (savedName) {
    userNameElement.textContent = savedName;
  }

  changeNameLink.addEventListener('click', function(event) {
    event.preventDefault();
    const currentName = userNameElement.textContent;
    const newName = prompt("Masukkan nama baru Anda:", currentName);
    if (newName && newName.trim() !== "") {
      userNameElement.textContent = newName;
      localStorage.setItem('userName', newName);
      alert('Nama berhasil diubah menjadi: ' + newName);
    }
  });

  const toggleDarkModeButton = document.getElementById('toggleDarkMode');
  
  if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
  }

  toggleDarkModeButton.addEventListener('click', function(event) {
    event.preventDefault();
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
      localStorage.setItem('darkMode', 'enabled');
    } else {
      localStorage.removeItem('darkMode');
    }
  });
});
</script>

<?php include '../includes/footer.php'; ?>