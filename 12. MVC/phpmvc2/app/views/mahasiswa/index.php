<div class="container mt-4">
  <div class="col-6">
    <?php Flasher::flash(); ?>
  </div>
  <div class="row">
    <div class="col-6">
      <!-- modal button -->
      <button type="button" class="btn btn-primary mb-3 tampilModalTambah" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Mahasiswa
      </button>
      <!-- end modal button -->
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <!-- search -->
      <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
        <div class="input-group mb-2">
          <input type="text" class="form-control" name="keyword" id="keyword" placeholder="cari mahasiswa..">
          <button class="btn btn-outline-success" type="submit" id="tombolCari">Cari</button>
        </div>
      </form>
      <!-- end search -->
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <h3>Daftar Mahasiswa</h3>
      <?php foreach ($data['mhs'] as $mhs) : ?>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <?= $mhs['nama']; ?>
            <span>
              <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge rounded-pill text-bg-primary">Detail</a>
              <a href="#" class="badge rounded-pill text-bg-warning tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
              <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge rounded-pill text-bg-danger hapusDataMahasiswa">Hapus</a>
              <!-- <a href="<?= BASEURL; ?>" class="badge rounded-pill text-bg-danger hapus">Hapus</a> -->
            </span>
          </li>
        </ul>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
          <input type="hidden" id="id" name="id">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Manajemen">Manejemen</option>
              <option value="Akutansi">Akutansi</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>