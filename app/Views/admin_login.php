<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md form">
            <div class="card w-50 py-4 mx-auto">
                <h1 class="judul">Login Admin</h1>
                <form action="">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="user-box" id="name" aria-describedby="emailHelp">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="email">Passowrd</label>
                        <input type="text" class="user-box" id="password" aria-describedby="emailHelp">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>