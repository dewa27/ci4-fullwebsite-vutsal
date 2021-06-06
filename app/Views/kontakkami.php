<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php if (!empty(session()->getTempdata('berhasil'))) { ?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="alert-box alert alert-success alert-dismissible text-center my-0" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo session()->getTempdata('berhasil'); ?>
			</div>
		</div>
	</div>
<?php } ?>
<div class="container-flud px-5 pt-2">
	<div class="row">
		<div class="col-md-8">
			<div class="container">
				<div class="row">
					<div class="col-md-12 mt-3">
						<p style="font-size: 22px;"><b>Kontak Kami</b></p>
						<h4 style="font-size: 14px;">Kami senang mendengar kritik dan saran dari Anda,</h4>
						<h4 style="font-size: 14px;">Silahkan hubungi kami dan kami akan memastikan untuk menghubungi anda kembali secepatnya</h4>
					</div>
					<form action="home/cek_kontak" method="post">
						<div class="col-md-12 mt-3">
							<label for="email"><b>Email*</b></label>
							<input name="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?> " id="email" placeholder="Alamat email" value="<?= old('email'); ?>">
							<div class=" invalid-feedback">
								<?= $validation->getError('email'); ?>
							</div>
						</div>
						<div class="col-md-12 mt-3">
							<label for="notlp"><b>Nomor Telepon*</b></label>
							<input name="no_hp" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" placeholder="Nomor telepon" value="<?= old('no_hp'); ?>">
							<div class="invalid-feedback">
								<?= $validation->getError('no_hp'); ?>
							</div>
						</div>
						<div class="col-md-12 mt-3">
							<label for="email"><b>Kritik dan Saran?*</b></label><br>
							<textarea class="form-control <?= ($validation->hasError('kritik_saran')) ? 'is-invalid' : ''; ?> " name="kritik_saran" id="kritik_saran" rows="5" cols="60" placeholder="Catat dan kami akan menghubungi anda secepat mungkin"><?= old('kritik_saran'); ?></textarea>
							<div class="invalid-feedback">
								<?= $validation->getError('kritik_saran'); ?>
							</div>
						</div>
						<div class="col-md-12 mt-3">
							<button type="submit" class="btn-submit"> Submit </button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row-kontak p-3 mt-4">
				<div class="col">
					<div class="alamat">
						<h4 style="font-size: 18px;"><i class="fas fa-map-marker-alt"></i> Alamat:</h4>
						<p style="font-size: 12px;">Jalan PB Jendral Sudirman, Denpasar Selatan</p>
					</div>
					<div class="notlp">
						<h4 style="font-size: 18px;"><i class="fas fa-phone-square-alt"></i> Nomor Telepon:</h4>
						<p style="font-size: 14px;">(0361)224 567</p>
					</div>
					<div class="jamoperasi">
						<h4 style="font-size: 18px;"><i class="far fa-clock"></i> Jam Operasional:</h4>
						<p style="font-size: 14px;">Senin-Kamis 09.00 AM - 05.30 PM</p>
						<p style="font-size: 14px;">Jumat 09.00 AM - 06.00 PM</p>
						<p style="font-size: 14px;">Selasa 11.00 AM - 05.00 PM</p>
					</div>
					<div class="mail">
						<h4 style="font-size: 18px;"> Email:</h4>
						<p style="font-size: 14px;">message@vutsal.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	* {
		font-family: "Poppins", sans-serif;
		padding: 0;
		margin: 0;
	}

	#container {
		margin-left: 100px;
		margin-right: 100px;
	}

	.btn-submit {
		border-radius: 20px !important;
		font-size: 14px !important;
		background-color: #fee600 !important;
		width: 90px;
	}

	.row-kontak {
		background-color: #383838 !important;
		color: white;
	}
</style>
<script>
	$('#myModal').modal('show');
	setTimeout(function() {
		$('.alert-box').fadeOut(1000, function() {
			$('#myModal').modal('hide');
		});
	}, 2000);
</script>
<?= $this->endSection(); ?>