<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3 class="fw-bolder">Daftar Mahasiswa</h3>
            <?php foreach ($data['mhs'] as $mhs) : ?>
                <ul>
                    <li><?= $mhs['nama']; ?></li>
                    <li><?= $mhs['npm']; ?></li>
                    <li><?= $mhs['kelas']; ?></li>
                    <li><?= $mhs['jurusan']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>

</div>