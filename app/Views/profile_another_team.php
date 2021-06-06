<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-5 pt-2">
    <div class="row mt-5">
        <div class="col-md-3">
            <img src="/images/<?= $tim['foto']; ?>" class="img-fluid" alt="Foto Tim Futsal">
        </div>

        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h2 class="content-header p-0 mb-2"><?= $tim['nama_team']; ?></h2>
                    <p class="content-subheader p-0 m-0"><?= $tim['deskripsi']; ?></p>
                    <p class="content-subheader p-0 mt-3 mb-0">Mau tanding Futsal? Mau bergabung dengan kami ?</p>
                    <a href="https://api.whatsapp.com/send?phone=<?= $tim['no_hp']; ?>" class="btn btn-success mt-0" id="button-hubungi" type="button">Hubungi via WhatsApp</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <h5 class="content-header p-0 mb-2">Anggota Tim</h5>
                    <hr class="hr-line2">
                    <div class="row">
                        <?php foreach ($anggota as $index => $a) : ?>
                            <div class="col-md-12">
                                <h5 class="content-subheader p-0 m-0"><?= $index + 1; ?>. <?= $a['nama_anggota']; ?></h5>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <h5 class="content-header p-0 mb-2">Prestasi</h5>
                    <hr class="hr-line2">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama Turnamen</th>
                            <th>Peringkat</th>
                            <th>Hadiah</th>
                        </tr>
                        <?php foreach ($prestasi as $index => $p) : ?>
                            <tr>
                                <th><?= $index + 1; ?>.</th>
                                <td><?= $p['nama_turnamen']; ?></td>
                                <td><?= $p['posisi']; ?></td>
                                <td><?= $p['hadiah']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script>

</script>
<?= $this->endSection(); ?>