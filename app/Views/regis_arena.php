<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-5 pt-2">
    <div class="row">
        <div class="col-md-8 form">
            <form class="px-0" action="daftar/daftar_arena" method="post" enctype="multipart/form-data">
                <h1 class="title">Pengelola Arena</h1>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item list-regis ml-0"><a href="<?= base_url('arena-login'); ?>">Masuk</a></li>
                    <li class="list-group-item list-regis">|</li>
                    <li class="list-group-item list-regis list-disabled"><a href="<?= base_url('arena-daftar'); ?>">Daftar</a></li>
                </ul>
                <div class="form-group">
                    <label for="nama_arena">Nama Arena</label>
                    <input type="text" name="nama_arena" class="form-control <?= ($validation->hasError('nama_arena')) ? 'is-invalid' : ''; ?>" id="nama_arena" aria-describedby="emailHelp" placeholder="Masukkan nama Arena Futsal Anda" value="<?= old('nama_arena'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_arena'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Handphone</label>
                    <input type="text" name="no_hp" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" aria-describedby="emailHelp" placeholder="Masukkan nomor handphone Anda" value="<?= old('no_hp'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_hp'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email_arena" class="form-control <?= ($validation->hasError('email_arena')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan masukkan email Anda" value="<?= old('email_arena'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email_arena'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" placeholder="Berikan deskripsi arena futsal Anda" value="<?= old('deskripsi'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('deskripsi'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto1">Unggah Foto</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto'); ?>
                        </div>
                        <label class="custom-file-label" for="foto">Pilih File</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mt-2" for="alamat">Lokasi</label>
                    <select name="lokasi" id="lokasi" class="custom-select form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>">
                        <option value="0" selected>Pilih Lokasi Arena</option>
                        <option value="1">Denpasar</option>
                        <option value="2">Badung</option>
                        <option value="3">Gianyar</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('lokasi'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" placeholder="Masukkan alamat arena futsal" value="<?= old('alamat'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_arena">Kata Sandi</label>
                    <input type="password" name="password_arena" class="form-control <?= ($validation->hasError('password_arena')) ? 'is-invalid' : ''; ?>" id="password_arena" placeholder="Mohon isi kata sandi Anda">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password_arena'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="re_password_arena">Konfirmasi Kata Sandi</label>
                    <input type="password" name="re_password_arena" class="form-control <?= ($validation->hasError('re_password_arena')) ? 'is-invalid' : ''; ?>" id="re_password_arena" placeholder="Ketik ulang kata sandi Anda">
                    <div class="invalid-feedback">
                        <?= $validation->getError('re_password_arena'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-submit">
                    <b>Daftar</b>
                </button>
            </form>
        </div>
        <div class="col-md-4">
            <img class="side-image-regis" src="./images/user.jpg" alt="">
        </div>
    </div>
</div>
<script>
    $('#foto').on('change', function() {
        //get the file name
        var fileName = $(this).val().substring(12);
        //replace the "Choose a file" label
        $('.custom-file-label').html(fileName);
    })
</script>
<?= $this->endSection(); ?>