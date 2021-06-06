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
          <!-- <div class="form-group">
            <select name="harga" id="harga" class="custom-select form-control filter">
              <option class="filter" value="0" selected>Pilih Rentang Harga</option>
              <option class="filter" value="1">Kurang dari 50.000</option>
              <option class="filter" value="2">50.000-100.000</option>
              <option class="filter" value="3">100.000-200.000</option>
            </select>
          </div> -->
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
          <!-- <ul class="nav nav-tabs ">
            <li class="dropdown show mr-3">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Urutkan Dari:
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Lokasi</a>
                <a class="dropdown-item" href="#">Harga</a>
                <a class="dropdown-item" href="#">jadwal</a>
              </div>
            </li>
          </ul> -->
        </div>
      </div>
      <div class="tampil">
        <?php foreach ($arenaArr as $index => $a) : ?>
          <div class="row shadow p-3 mb-5 bg-white rounded">
            <div class="col-4 ">
              <img src="/images/<?= $a['foto_arena']; ?>" alt="Responsive image" class="img-fluid" width="300px" height="100%">
            </div>
            <div class="col-6">
              <h3><?= $a['nama_arena']; ?></h3>
              <h6 class="font-italic"><?= $a['alamat']; ?></h6>
              <p>
                <?= $a['deskripsi']; ?>
              </p>
              <button type="button" class="btn btn-warning mt-5"><a class="white" href="/arena/<?= $a['arena_id']; ?>">Reservasi Sekarang</a></button>
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
        url: "<?php echo site_url('arena/find_arena'); ?>",
        data: {
          'keyword': $('#search').val(),
          'location': $('#lokasi').val(),
          'price': $('#harga').val(),
        },
        dataType: 'JSON',
        success: function(res) {
          console.log(res);
          let hasil = "";
          res.forEach(function(item, index) {
            console.log(item.arena_id);
            hasil = hasil +
              `<div class="row shadow p-3 mb-5 bg-white rounded">
              <div class="col-4 ">
                <img src="/images/${item.foto_arena}" alt="Foto" class="img-fluid" width="300px" height="100%">
              </div>
              <div class="col-6">
                <h3>${item.nama_arena}</h3>
                <h6 class="font-italic">${item.alamat}</h6>
                <p>${item.deskripsi}</p>
                <button type="button" class="btn btn-warning mt-5"><a class="white" href="/arena/${item.arena_id}">Reservasi Sekarang</a></button>
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