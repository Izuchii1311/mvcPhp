<div class="container mt-3">

  <div class="row">
    <div class="col-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row">

    <div class="col">
      <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Data Mahasiswa</button>
      <h3 class="fw-bolder mb-3">Daftar Mahasiswa</h3>
        <ul class="list-group">
          <?php foreach ($data['mhs'] as $mhs) : ?>
            <li class="list-group-item ">
              <?= $mhs['nama']; ?>
              <!-- Alangkah baiknya pakai Sweet Alert -->
              <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge text-bg-danger float-end p-2" style="text-decoration: none" onclick="return confirm('yakin?');">hapus</a>
              <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-primary float-end me-3 p-2" style="text-decoration: none">detail</a>
            </li>
          <?php endforeach; ?>
        </ul>
    </div>

  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Apakah anda ingin menambahkan data baru?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Mengarah ke method tambah -->
      <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" >
        </div>
        <div class="mb-3">
          <label for="npm" class="form-label">NPM</label>
          <input type="number" class="form-control" id="npm" aria-describedby="npm" name="npm" >
        </div>
        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <input type="text" class="form-control" id="kelas" aria-describedby="kelas" name="kelas" >
        </div>
        <div class="mb-3">
          <label for="jurusan" class="form-label">Pilih Jurusan</label>
          <select id="jurusan" class="form-select" name="jurusan">
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Design Komunikasi Visual">Design Komunikasi Visual</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </form>

      </div>
    </div>
  </div>
</div>