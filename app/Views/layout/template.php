<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" />
    <script src="/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datepicker.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="nav-container">
            <div class="trapesium">

            </div>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img class="logo" src="<?= $base_url; ?>/images/logo.svg" alt="">
            </a>
        </div>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('book'); ?>">Reservasi Lapangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/lawan">Cari Lawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kontak">Kontak Kami</a>
                </li>
            </ul>
            <div class="navbar-nav ml-auto navbar-kanan">
                <?php if (!empty(session()->get('nama_team'))) { ?>
                    <div class="dropdown">
                        <button class="btn btn-login dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo session()->get('nama_team') ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= base_url('/team-detail'); ?>">Pengaturan</a>
                            <a class="dropdown-item" href="<?= base_url('/profile'); ?>">Profile Akun</a>
                            <a class="dropdown-item" href="/team/pemesanan">Pemesanan Saya</a>
                            <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>">Log Out</a>
                        </div>
                    </div>
                <?php } else if (!empty(session()->get('nama_arena'))) { ?>
                    <div class="dropdown">
                        <button class="btn btn-login dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo session()->get('nama_arena') ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo base_url('/arena-detail') ?>">Pengaturan</a>
                            <a class="dropdown-item" href="/arena/pemesanan">Pemesanan</a>
                            <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>">Log Out</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <button type="button" class="btn btn-login" data-toggle="modal" data-target="#exampleModal">
                        Daftar / Masuk
                    </button>
                <?php } ?>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url('/team-login'); ?>"><img class="img-w" src="<?= $base_url; ?>/images/team.jpg" alt=""></a>
                                <p>Login Team</p>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url('/arena-login'); ?>"><img class="img-w" src="<?= $base_url; ?>/images/arena1.jpeg" alt=""></a>
                                <p>Login Pengelola Arena</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->renderSection('content'); ?>
    <!-- Copyright -->
    <footer>
        <div class="footer-copyright mt-5 py-3">
            <div class="footer-text">
                <h3>Bergabunglah dengan kami</h3>
                <p>Vutsal : Reservasi lapangan futsal jadi lebih mudah</p>
                <hr class="hr-line">
                <div>
                    <a href=""><i class="fa fa-instagram mr-2 socmed-icon"></i></a>
                    <a href=""><i class="fa fa-facebook socmed-icon"></i></a>
                </div>
            </div>
            <p class="text-right mt-5 mr-5 copyright">Copyright © 2020 Vutsal</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
</body>

</html>