<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="mt-3 container">
  <div class="row bg-light">
    <div class="col-sm-7 py-3">
      <h2 class="font-weight-bold mb-3"><?= $arena[0]['nama_arena']; ?></h2>
      <p class="font-italic"><?= $arena[0]['alamat']; ?></p>
      <p><?= $arena[0]['deskripsi']; ?></p>
      <a href="https://api.whatsapp.com/send?phone=<?= $arena[0]['no_hp']; ?>" class="btn btn-success mt-0" id="button-hubungi" type="button">Hubungi via WhatsApp</a>
    </div>
    <div class="col-sm-5">
      <img src="/images/<?= $arena[0]['foto_arena']; ?>" alt="Responsive image" class="img-fluid" minwidth="400px">
    </div>
  </div>

  <div class="row mt-5">
    <h3 class="font-weight-bold p-2 jadwal" style="border-bottom: solid;">Jadwal Operasi</h3>
  </div>
  <div class=" row mt-4">
    <table class="table d-inline-flex">
      <tbody class="font-weight-bold">
        <tr>
          <td width="550px">Senin</td>
          <?php if (($jadwal_arena[0]['jam_mulai']) == null) { ?>
            <td>Libur</td>
          <?php } else { ?>
            <td><?= substr($jadwal_arena[0]['jam_mulai'], 0, -3); ?> - <?= substr($jadwal_arena[0]['jam_selesai'], 0, -3);  ?></td>
          <?php } ?>
        </tr>
        <tr>
          <td width="550px">Selasa</td>
          <?php if (($jadwal_arena[1]['jam_mulai']) == null) { ?>
            <td>Libur</td>
          <?php } else { ?>
            <td><?= substr($jadwal_arena[1]['jam_mulai'], 0, -3); ?> - <?= substr($jadwal_arena[1]['jam_selesai'], 0, -3);  ?></td>
          <?php } ?>
        </tr>
        <tr>
          <td width="550px">Rabu</td>
          <?php if (($jadwal_arena[2]['jam_mulai']) == null) { ?>
            <td>Libur</td>
          <?php } else { ?>
            <td><?= substr($jadwal_arena[2]['jam_mulai'], 0, -3); ?> - <?= substr($jadwal_arena[2]['jam_selesai'], 0, -3);  ?></td>
          <?php } ?>
        </tr>
        <tr>
          <td width="550px">Kamis</td>
          <?php if (($jadwal_arena[3]['jam_mulai']) == null) { ?>
            <td>Libur</td>
          <?php } else { ?>
            <td><?= substr($jadwal_arena[3]['jam_mulai'], 0, -3); ?> - <?= substr($jadwal_arena[3]['jam_selesai'], 0, -3);  ?></td>
          <?php } ?>
        </tr>
        <tr>
          <td width="550px">Jumat</td>
          <?php if (($jadwal_arena[4]['jam_mulai']) == null) { ?>
            <td>Libur</td>
          <?php } else { ?>
            <td><?= substr($jadwal_arena[4]['jam_mulai'], 0, -3); ?> - <?= substr($jadwal_arena[4]['jam_selesai'], 0, -3);  ?></td>
          <?php } ?>
        </tr>
        <tr>
          <td width="550px">Sabtu</td>
          <?php if (($jadwal_arena[5]['jam_mulai']) == null) { ?>
            <td>Libur</td>
          <?php } else { ?>
            <td><?= substr($jadwal_arena[5]['jam_mulai'], 0, -3); ?> - <?= substr($jadwal_arena[5]['jam_selesai'], 0, -3);  ?></td>
          <?php } ?>
        </tr>
        <tr>
          <td width="550px">Minggu</td>
          <?php if (($jadwal_arena[6]['jam_mulai']) == null) { ?>
            <td>Libur</td>
          <?php } else { ?>
            <td><?= substr($jadwal_arena[6]['jam_mulai'], 0, -3); ?> - <?= substr($jadwal_arena[6]['jam_selesai'], 0, -3);  ?></td>
          <?php } ?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mt-4 mb-3">
    <h3 class="font-weight-bold p-2" style="border-bottom: solid;">Lapangan</h3>
  </div>
  <div class="row">
    <?php foreach ($arena as $index => $a) : ?>
      <div class="col-sm-4 bg-dark p-3">
        <img src="https://lh3.googleusercontent.com/p/AF1QipPQVx7fKFjGmkNvYK--NFSlklOAwfHxarCNBXXA=s1280-p-no-v1" alt="Responsive image" class="img-fluid px-3 py-2">
        <h3 class="text-warning px-3"><?= $a['nama_lapangan']; ?></h3>
        <h5 class="font-weight-bold text-light px-3 mt-2"><?= $a['harga']; ?></h5>
        <?php if (!empty(session()->get('nama_team'))) { ?>
          <button type="button" id="<?= $a['lapangan_id']; ?>" class="btn ml-3 filter modal-btn" data-toggle="modal" data-target="#pesanModal">
            Pesan Lapangan
          </button>
        <?php } else { ?>
          <button disabled type="button" id="<?= $a['lapangan_id']; ?>" class="btn ml-3 filter modal-btn" data-toggle="modal" data-target="#pesanModal">
            Pesan Lapangan
          </button>
        <?php } ?>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="row">
    <div class="col-md-12 px-0 mt-2">
      <?php if (empty(session()->get('nama_team'))) : ?>
        <div class="alert alert-warning text-center" role="alert">
          Anda harus login terlebih dahulu !
        </div>
        <p>Belum punya akun?<a href="/team-daftar"> Daftar disini</a></p>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="modal fade" id="pesanModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Lapangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-item">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="button" class="btn filter" id="pesan">Pesan</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    function format(bilangan) {
      var number_string = bilangan.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      return rupiah;
    }
    $('.modal-btn').click(function() {
      let id_lapangan = $(this).attr('id');
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('arena/get_harga_jadwal'); ?>",
        data: {
          'id': id_lapangan,
        },
        success: function(res) {
          let view_modal = `<div class="form-group"><label class="">Tanggal Main</label>
                <input type="text" id="tanggal_book" class="form-control">
              </div>
              <div class="form-group">
                <label class="">Jam</label>
                <input type="text" id="jam_book" class="form-control">
              </div>
              <div class="form-group">
                <label class="">Jam Bermain</label>
                <div class="input-group mb-2">
                  <input type="number" class="form-control" id="durasi_book" placeholder="Masukkan angka (dalam jam)">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Jam</div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="">Harga</label>
                <input type="text" id="harga_book" class="form-control" disabled>
              </div>`;
          $('.modal-item').html(view_modal);
          jQuery('#tanggal_book').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'D, d M Y',
            lang: 'id',
            minDate: 0,
          });
          jQuery('#jam_book').datetimepicker({
            timepicker: true,
            datepicker: false,
            format: 'H:i',
            lang: 'id',
            step: 30,
          });
          let data = JSON.parse(res);
          console.log("ah");
          console.log(data.lapangan);
          console.log(data.arena);
          $('#durasi_book').keyup(function() {
            console.log($(this).val());
            console.log(data.lapangan.harga);
            let harga_mentah = $(this).val() * data.lapangan.harga;
            let harga = format(harga_mentah);
            console.log(harga);
            $('#harga_book').val('Rp ' + harga);
            $('#pesan').unbind().bind('click', function() {
              $.ajax({
                type: "POST",
                url: "<?php echo site_url('arena/pesan_lapangan'); ?>",
                data: {
                  tanggal_main: $('#tanggal_book').val(),
                  jam_book: $('#jam_book').val(),
                  durasi: $('#durasi_book').val(),
                  harga: harga_mentah,
                  id_lap: id_lapangan,
                },
                success: function(resp) {
                  console.log($('#tanggal_book').val());
                  console.log($('#jam_book').val());
                  console.log($('#durasi_book').val());
                  console.log(resp);
                  Swal.fire({
                    title: 'Berhasil',
                    text: 'Pesanan berhasil dilakukan',
                    icon: 'success',
                  });
                },
              });
            });
          });
          $('#pesan').click(function() {
            let countee1;
            let countee2;
            let countee3;
            if ($('#tanggal_book').val() == "") {
              countee1 = 1;
            } else {
              countee1 = 0;
            }
            if ($('#jam_book').val() == "") {
              countee2 = 1;
            } else {
              countee2 = 0;
            }
            if ($('#durasi_book').val() == "") {
              countee3 = 1;
            } else {
              countee3 = 0;
            }
            let bigconter = countee1 + countee2 + countee3;
            if (bigconter > 0) {
              Swal.fire({
                title: 'Error',
                text: 'Harap isi semua data pesanan',
                icon: 'error',
              });
            }
          });
        },
      });
    });
  });
</script>
<?= $this->endSection(); ?>