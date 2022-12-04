<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <!-- Kita tidak bisa menggunakan relativ url, kita bisa menggunakan absolute url -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">
    <!-- sweet  alert -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/sweetalert2.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL; ?>">PHP MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link <?= ($data['judul'] == 'Home') ? 'active' : ''  ?>" href=" <?= BASE_URL; ?>">Home</a>
                    <a class="nav-link <?= ($data['judul'] == 'About' || $data['judul'] == 'Page') ? 'active' : ''  ?>" href="<?= BASE_URL; ?>/about">About</a>
                    <a class="nav-link <?= ($data['judul'] == 'Daftar Mahasiswa' || $data['judul'] == 'Detail Mahasiswa') ? 'active' : ''  ?>" href="<?= BASE_URL; ?>/mahasiswa">Mahasiswa</a>
                </div>
            </div>
        </div>
    </nav>