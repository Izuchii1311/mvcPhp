<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3 class="fw-bolder">Daftar Mahasiswa</h3>
            <!-- <ul>
                <li><?= $mhs['nama']; ?></li>
                    <li><?= $mhs['npm']; ?></li>
                    <li><?= $mhs['kelas']; ?></li>
                    <li><?= $mhs['jurusan']; ?></li>
                </ul> -->
                
                <ul class="list-group">
                    <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-primary" style="text-decoration: none">detail</a>
                    </li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </div>

</div>