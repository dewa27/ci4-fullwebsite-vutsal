<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <img class="side-image-regis" src="./images/blog-item-01.png" alt="">
        </div>
        <div class="col-md-9 form">
            <div>
                <?php foreach ($team as $t) : ?>
                    <p><?= $t['email_team']; ?></p>
                <?php endforeach; ?>
            </div>
            <form action="">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Masukkan nama">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukkan email">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
                </div>
                <div class="form-group">
                    <label for="nohp">Nama</label>
                    <input type="text" class="form-control" id="nohp" aria-describedby="emailHelp" placeholder="Masukkan No HP">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="k-password">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="k-password" placeholder="Konfirmasi Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>