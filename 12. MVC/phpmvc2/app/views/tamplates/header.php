<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman <?= $data['judul']; ?></title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
  <!-- sweetalert -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/sweetalert2.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="<?= BASEURL; ?>">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link <?= ($data['judul'] == 'Home') ? 'active' : ''  ?> " aria-current="page" href="<?= BASEURL; ?>">Home</a>
          <a class="nav-link <?= ($data['judul'] == 'About' || $data['judul'] == 'Page') ? 'active' : '' ?>" href="<?= BASEURL; ?>/about">About</a>
          <a class="nav-link <?= ($data['judul'] == 'Daftar Mahasiswa') ? 'active' : '' ?>" href="<?= BASEURL; ?>/mahasiswa">Mahasiswa</a>
        </div>
      </div>
    </div>
  </nav>