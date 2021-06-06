<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-5 pt-2">
    <div class="row">
        <div class="col-md-8 form">
            <?php echo form_open('login/cek_login') ?>
            <form class="px-0" action="">
                <h1 class="title">Team</h1>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item list-regis list-disabled ml-0"><a href="<?= base_url('team-login'); ?>">Masuk</a></li>
                    <li class="list-group-item list-regis">|</li>
                    <li class="list-group-item list-regis"><a href="<?= base_url('team-daftar'); ?>">Daftar</a></li>
                </ul>
                <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo session()->getFlashdata('gagal'); ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email_team" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan masukkan email Anda">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kata Sandi</label>
                    <input type="password" name="password_team" class="form-control" id="exampleInputPassword1" placeholder="Mohon isi kata sandi Anda">
                </div>
                <button type="submit" class="btn btn-submit">
                    <b>Masuk</b>
                </button>
            </form>
            <?php echo form_close() ?>
        </div>
        <div class="col-md-4">
            <img class="side-image-regis" src="./images/user.jpg" alt="">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>