<div class="container mt-4">
    <h1>About Me</h1>
    <img src="<?= BASE_URL; ?>/img/<?= $data['nama'] ?>.jpg" alt="<?= $data['nama'] ?>" width="200" height="200" class="rounded-circle shadow">
    <!-- cara mengambi data yang dikirimkan -->
    <p>Halo, saya <?= $data['nama']; ?> saya seorang <?= $data['pekerjaan']; ?>. Saya berumur <?= $data['umur']; ?></p>
</div>