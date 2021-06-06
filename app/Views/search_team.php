<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-5 pt-2">
  <div class="row mt-5">
    <div class="col-3 mt-5 col-fluid ">
      <div class="p-3 bg-dark">
        <p class="text-center text-white mt-3 font-weight-bold">Filter</p>
        <form action="<?= site_url('arena/find_arena'); ?>" method="POST">
          <div class="form-group">
            <select name="lokasi" id="lokasi" class="custom-select form-control filter">
              <option class="filter" value="0" selected>Pilih Lokasi Arena</option>
              <option class="filter" value="1">Denpasar</option>
              <option class="filter" value="2">Badung</option>
              <option class="filter" value="3">Gianyar</option>
            </select>
          </div>
        </form>
      </div>
    </div>

    <div class="col-9">
      <div class="row mb-3 justify-content-end">
        <div class="col-md-9">
          <div class="md-form mt-0">
            <input id="search" class="form-control" type="text" placeholder="Cari nama..." aria-label="Search">
          </div>
        </div>
        <div class="col-md-3">
          <button type="button" id="terapkan" class="btn bg-dark btn-outline-warning mb-3 center-block">Cari</button>
        </div>
      </div>
      <div class="tampil">
        <?php foreach ($teamArr as $index => $a) : ?>
          <div class="row shadow p-3 mb-5 bg-white rounded">
            <div class="col-4 ">
              <img src="/images/<?= $a['foto']; ?>" alt="Responsive image" class="img-fluid" width="300px" height="100%">
            </div>
            <div class="col-6">
              <h3><?= $a['nama_team']; ?></h3>
              <p>
                <?= $a['deskripsi']; ?>
              </p>
              <button type="button" class="btn btn-warning mt-5"><a class="white" href="/team/<?= $a['team_id']; ?>">Lihat Profile</a></button>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#terapkan').click(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('team/find_team'); ?>",
        data: {
          'keyword': $('#search').val(),
          'location': $('#lokasi').val(),
        },
        dataType: 'JSON',
        success: function(res) {
          console.log(res);
          let hasil = "";
          res.forEach(function(item, index) {
            console.log(item.team_id);
            hasil = hasil +
              `<div class="row shadow p-3 mb-5 bg-white rounded">
              <div class="col-4 ">
                <img src="/images/logo-futsal.png" alt="Foto" class="img-fluid" width="300px" height="100%">
              </div>
              <div class="col-6">
                <h3>${item.nama_team}</h3>
                <p>${item.deskripsi}</p>
                <button type="button" class="btn btn-warning mt-5"><a class="white" href="/team/${item.team_id}">Lihat Team</a></button>
              </div>
          </div>`
          });
          $('.tampil').html(hasil);
        }
      });
    });
  });
</script>
<?= $this->endSection(); ?>