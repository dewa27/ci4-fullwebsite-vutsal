<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php if (!empty(session()->getTempdata('berhasil'))) { ?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="alert-box alert alert-warning alert-dismissible text-center my-0" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo session()->getTempdata('berhasil'); ?>
			</div>
		</div>
	</div>
<?php } ?>
<div class="jumbotron jumbotron-fluid py-0 my-0">
	<div class="container container-jumbotron">
		<!-- <form>
			<input type="text" name="location-home">
			<input type="date" name="booking-home">
		</form> -->
		<div class="text-center">
			<img class="logo-jumbotron" src="<?= $base_url; ?>/images/logo-black.svg" alt="">
			<h1 class="text-jumbotron mt-3">Temukan Lapangan dan Undang Lawan Bermainmu</h1>
			<button onclick="window.location.href='/book';" class="btn-jumbotron mt-5" type="button">Temukan Lapanganmu</button>
		</div>
	</div>
</div>
<!-- <div class="first-content">
	<div class="container">
		<h2 class="header-content text-center py-3">Testimoni Pengguna</h2>
		<div class="row">
			<div class="col-md-4 testi">
				<div class="testi-arena text-center">
					<p class="my-0">Lapangan Futsal Deten Poh</p>
					<p class="my-0">Jl.Batuyang</p>
				</div>
				<img class="testi-foto w-100" src="<?= $base_url; ?>/images/arena_futsal1.jpg" alt="">
				<img class="user-foto" src="<?= $base_url; ?>/images/foto.jpg" alt="">
				<p class="mt-3">Lorem ipsum sir dolor amet</p>
			</div>
			<div class="col-md-4 testi">
				<div class="testi-arena text-center">
					<p class="my-0">Lapangan Futsal Deten Poh</p>
					<p class="my-0">Jl.Batuyang</p>
				</div>
				<img class="testi-foto w-100" src="<?= $base_url; ?>/images/arena_futsal1.jpg" alt="">
				<img class="user-foto" src="<?= $base_url; ?>/images/foto.jpg" alt="">
				<p class="mt-3">Lorem ipsum sir dolor amet</p>
			</div>
			<div class="col-md-4 testi">
				<div class="testi-arena text-center">
					<p class="my-0">Lapangan Futsal Deten Poh</p>
					<p class="my-0">Jl.Batuyang</p>
				</div>
				<img class="testi-foto w-100" src="<?= $base_url; ?>/images/arena_futsal1.jpg" alt="">
				<img class="user-foto" src="<?= $base_url; ?>/images/foto.jpg" alt="">
				<p class="mt-3">Lorem ipsum sir dolor amet</p>
			</div>
		</div>
	</div>
</div> -->
<div class="second-content container">
	<div class="row">
		<div class="col-md-4">
			<img class="hp" src="<?= $base_url; ?>/images/hp.png" alt="">
		</div>
		<div class="col-md-8">
			<h1 class="text-download">Download Aplikasi Vutsal</h1>
			<h4>Download aplikasi reservasi lapangan futsal secara online</h4>
			<img class="logo-googleplay" src="<?= $base_url; ?>/images/googleplay.png" alt="">
		</div>
	</div>
</div>
<!-- <div class="jumbotron">
	<div class="content-jumbotron">
		<img class="logo-jumbotron" src="<?= $base_url; ?>/images/logo-black.svg" alt="">
		<p class="text-jumbotron">Temukan Lapangan dan Undang Lawan Bermainmu</p>
	</div>
</div> -->
<script>
	$('#myModal').modal('show');
	setTimeout(function() {
		$('.alert-box').fadeOut(1000, function() {
			$('#myModal').modal('hide');
		});
	}, 2000);
</script>
<?= $this->endSection(); ?>