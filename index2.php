<?php include '../includes/header.php'; ?>

<style>
.bantuan-page {
  min-height: 100vh;
  background: url('../assets/img/begrondasar.jpg') no-repeat center center;
  background-size: cover;
  background-attachment: fixed;
  font-family: 'Segoe UI', sans-serif;
  padding: 20px;
  box-sizing: border-box;
}

.bantuan-box {
  max-width: 500px;
  margin: auto;
  background-color: #fef5e7;
  padding: 20px;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.bantuan-box h2 {
  text-align: center;
  margin-bottom: 24px;
  color: #4b2c20;
}

.faq-item {
  margin-bottom: 12px;
}

.faq-question {
  background-color: #fff5ee;
  color: #4b2c20;
  padding: 12px 15px;
  border: 1px solid #eaddcf;
  border-radius: 8px;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: bold;
}

.faq-question::after {
  content: '▼';
  font-size: 12px;
  transition: transform 0.3s;
}

.faq-question.active::after {
  transform: rotate(180deg);
}

.faq-answer {
  padding: 15px;
  background-color: #ffffff;
  border: 1px solid #eaddcf;
  border-top: none;
  border-radius: 0 0 8px 8px;
  display: none;
  color: #5c4033;
  line-height: 1.6;
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
  text-decoration: none;
}
</style>

<div class="bantuan-page">
  <div class="bantuan-box">
    <h2>Pusat Bantuan</h2>

    <div class="faq-item">
      <div class="faq-question">Bagaimana cara mengubah nama saya?</div>
      <div class="faq-answer">
        Anda dapat mengubah nama dengan kembali ke halaman 'Akun Saya', lalu klik pada menu "Ubah Nama (Membership)".
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Bagaimana cara memesan?</div>
      <div class="faq-answer">
        Pergi ke halaman 'Explore', pilih produk yang Anda inginkan, lalu tambahkan ke keranjang. Lanjutkan proses dari halaman 'Order' untuk menyelesaikan pesanan.
      </div>
    </div>
    
    <!-- ===== INI BAGIAN YANG SUDAH DIUBAH KE WHATSAPP ===== -->
    <div class="faq-item">
      <div class="faq-question">Bagaimana cara menghubungi Customer Service?</div>
      <div class="faq-answer">
        Tentu! Cara termudah adalah dengan kembali ke halaman 'Akun Saya' dan menekan tombol <strong>"Hubungi via WhatsApp"</strong>.
        <br><br>
        Atau, Anda bisa langsung chat kami dengan klik link ini: 
        <a href="tel:+6282182440102">
          <span>+6282182440102</span>
        </a>
      </div>
    </div>
    <!-- ===== AKHIR BAGIAN YANG DIUBAH ===== -->

     <div class="faq-item">
      <div class="faq-question">Apa itu Poin?</div>
      <div class="faq-answer">
        Poin adalah reward yang Anda dapatkan setiap kali melakukan transaksi. Poin ini nantinya bisa ditukarkan dengan diskon atau produk spesial.
      </div>
    </div>

  </div>

  <a href="../akun/index.php" class="kembali-btn">← Kembali ke Akun</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const faqQuestions = document.querySelectorAll('.faq-question');

  faqQuestions.forEach(question => {
    question.addEventListener('click', () => {
      question.classList.toggle('active');
      const answer = question.nextElementSibling;
      if (answer.style.display === 'block') {
        answer.style.display = 'none';
      } else {
        answer.style.display = 'block';
      }
    });
  });
});
</script>


<?php include '../includes/footer.php'; ?>