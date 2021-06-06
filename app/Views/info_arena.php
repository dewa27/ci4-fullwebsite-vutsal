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
<div class="container-fluid px-5 pt-2">
    <div class="row mt-5">
        <div class="col-3 col-fluid " style="height: 300px;">
            <h2 class="content-header p-0 mb-2">Pengaturan</h2>
            <div class="p-3 bg-dark">
                <ul class="list-group">
                    <li class="list-group-item list-info-akun"><a href="#informasi">Informasi Akun</a></li>
                    <li class="list-group-item list-info-akun"><a href="#lapangan">Lapangan</a></li>
                    <li class="list-group-item list-info-akun"><a href="#jadwal">Jadwal</a></li>
                    <hr class="hr-line">
                    <!-- <li class="list-group-item list-info-akun">Ubah Password</li>
                    <hr class="hr-line"> -->
                </ul>
            </div>

        </div>

        <div class="col-9 mt-5">
            <div id="informasi" class="row mb-5 bg-white">

                <div class="col-12 ">
                    <p class="d-inline-block article-header mb-2">Informasi Akun</p>
                    <div class="btn-group float-right mb-2" role="group">
                        <button class="btn btn-primary" id="button-edit" type="button">Ubah</button>
                        <button class="btn btn-success" id="button-save" type="button">Simpan</button>
                    </div>
                    <hr class="hr-line2">
                    <form class="p-0 m-0" id="edit_akun" action="<?php echo site_url('arena/edit_info'); ?>" method="post">
                        <div class="form-group">
                            <label for="edit_nama_team">Nama Arena</label>
                            <input type="text" name="edit_nama_arena" class="form-control edit_akun" id="edit_nama_arena" aria-describedby="emailHelp" placeholder="Silahkan masukkan email Anda" value="<?= $arena['nama_arena']; ?>" readonly='readonly'>
                        </div>
                        <div class="form-group">
                            <label for="edit_kontak_arena">Kontak Arena</label>
                            <input type="text" name="edit_kontak_arena" class="form-control edit_akun" id="edit_kontak_arena" placeholder="Masukkan No HP Anda" value='<?= $arena['no_hp']; ?>' readonly='readonly'>
                        </div>
                        <div class="form-group">
                            <label for="edit_email_arena">Email Arena</label>
                            <input type="text" name="edit_email_arena" class="form-control edit_akun" id="edit_email_arena" placeholder="Mohon isi email Anda" value="<?= $arena['email_arena']; ?>" readonly='readonly'>
                        </div>
                        <div class="form-group">
                            <label for="edit_deskripsi_arena">Deskripsi Arena</label>
                            <textarea class="form-control edit_akun" id="edit_deskripsi_arena" placeholder="Mohon isi deskripsi arena Anda" name="edit_deskripsi_arena" rows="3" readonly='readonly'><?= $arena['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_alamat_arena">Alamat Arena</label>
                            <textarea class="form-control edit_akun" id="edit_alamat_arena" placeholder="Mohon isi alamat arena Anda" name="edit_alamat_arena" rows="3" readonly='readonly'><?= $arena['alamat']; ?></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div id="lapangan" class=" row mb-5 bg-white">

                <div class="col-12 ">
                    <p class="d-inline-block article-header mb-2">Lapangan</p>
                    <div class="btn-group float-right mb-2" role="group">
                        <button class="btn btn-primary" id="button-edit-lapangan" type="button">Ubah</button>
                        <button class="btn btn-primary" id="button-tambah-lapangan" type="button">Tambah</button>
                        <button class="btn btn-success" id="button-save-lapangan" type="button">Simpan</button>
                    </div>
                    <hr class="hr-line2">
                    <form action="p-0 m-0" class="edit_lapangan" action="<?php echo site_url('arena/edit_lapangan'); ?>" method="post">
                        <ul class="list-group" id="edit-lapangan">
                            <?php foreach ($lapangan as $index => $a) : ?>
                                <li class="list-group-item mt-2 jml_edit">
                                    <label id="<?= $a['lapangan_id']; ?>" class="lapangan_label">Lapangan <?= $index + 1; ?></label>
                                    <input type="text" name="edit_lapangan_arena[]" class="form-control edit_data_lapangan" aria-describedby="emailHelp" placeholder="Silahkan nama anggota Tim Anda" readonly='readonly' value="<?= $a['nama_lapangan']; ?>">
                                    <label class="mt-3">Jenis Lapangan</label>
                                    <select class="form-control edit_jenis_lapangan" disabled="true">
                                        <option disabled value="0">Pilih Jenis Lapangan</option>
                                        <option <?= $a['jenis_lapangan'] == "Reguler" ? 'selected' : ''; ?> value="Reguler">Reguler</option>
                                        <option <?= $a['jenis_lapangan'] == "Premium" ? 'selected' : ''; ?> value="Premium">Premium</option>
                                    </select>
                                    <label class="mt-3">Harga</label>
                                    <input type="text" name="edit_harga_lapangan[]" class="form-control edit_harga_lapangan" aria-describedby="emailHelp" placeholder="Silahkan masukkan harga" readonly='readonly' value="<?= $a['harga']; ?>">
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </form>
                </div>
            </div>
            <div id="jadwal" class=" row mb-5 bg-white">
                <div class="col-12 ">
                    <p class="d-inline-block article-header mb-2">Jadwal</p>
                    <div class="btn-group float-right mb-2" role="group">
                        <button class="btn btn-primary" id="button-edit-jadwal" type="button">Ubah</button>
                        <button class="btn btn-success" id="button-save-jadwal" type="button">Simpan</button>
                    </div>
                    <hr class="hr-line2">
                    <ul class="list-group" id="edit-jadwal">
                        <?php foreach ($jadwal as $index => $j) : ?>
                            <li id="j<?= $j['jadwal_id']; ?>" class="list-group-item mt-2 hari">
                                <label class="jadwal_label"><?= $j['hari']; ?></label>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 px-0">
                                            <input type="time" name="edit_jadwal_arena[]" class="form-control edit_data_jadwal" disabled value="<?= $j['jam_mulai']; ?>">
                                        </div>
                                        <div class="col-md-1 align-middle px-0">
                                            <p class="text-center my-auto">-</p>
                                        </div>
                                        <div class="col-md-4 px-0">
                                            <input type="time" name="edit_jadwal_arena[]" class="form-control edit_data_jadwal" disabled value="<?= $j['jam_selesai']; ?>">
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-danger btn-jadwal button-tutup-jadwal" type="button">Libur</button>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-success btn-jadwal button-buka-jadwal" type="button">Buka</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#myModal').modal('show');
        setTimeout(function() {
            $('.alert-box').fadeOut(1000, function() {
                $('#myModal').modal('hide');
            });
        }, 2000);
        $('#button-save').hide();
        $('#button-save-lapangan').hide();
        $('#button-tambah-lapangan').hide();
        $('#button-edit').click(function() {
            $('.edit_akun').removeAttr('readonly');
            $('#button-edit').hide();
            $('#button-save').show();
        });
        $('#button-save').click(function() {
            $('.edit_akun').attr('readonly', 'readonly');
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('arena/edit_info'); ?>",
                data: {
                    'edit_nama_arena': $('#edit_nama_arena').val(),
                    'edit_kontak_arena': $('#edit_kontak_arena').val(),
                    'edit_email_arena': $('#edit_email_arena').val(),
                    'edit_deskripsi_arena': $('#edit_deskripsi_arena').val(),
                    'edit_alamat_arena': $('#edit_alamat_arena').val()
                },
                success: function() {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Informasi akun berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#button-save').hide();
                    $('#button-edit').show();
                }
            });
        });
        $('#button-edit-lapangan').click(function() {
            $('.edit_data_lapangan').removeAttr('readonly');
            $('.edit_harga_lapangan').removeAttr('readonly');
            $('.edit_jenis_lapangan').removeAttr('disabled');
            $('#button-edit-lapangan').hide();
            $('#button-save-lapangan').show();
            $('#button-tambah-lapangan').show();
        });
        $('#button-save-lapangan').click(function() {
            let namaLapanganArr = new Array();
            $('.edit_data_lapangan').each(function() {
                namaLapanganArr.push($(this).val());
            });
            let hargaLapanganArr = new Array();
            $('.edit_harga_lapangan').each(function() {
                hargaLapanganArr.push($(this).val());
            });
            let jenisLapanganArr = new Array();
            $('.edit_jenis_lapangan').each(function() {
                jenisLapanganArr.push($(this).val());
            });
            let idLapanganArr = new Array();
            if (('.lapangan_label').length != 0) {
                $('.lapangan_label').each(function() {
                    idLapanganArr.push($(this).attr('id'));
                });
            } else {
                idLapanganArr = null;
                jenisLapanganArr = null;
                namaLapanganArr = null;
                hargaLapanganArr = null;
            }
            let tambahNamaLapanganArr = new Array();
            $('.tambah_data_lapangan').each(function() {
                tambahNamaLapanganArr.push($(this).val());
            });
            let tambahHargaLapanganArr = new Array();
            $('.tambah_harga_lapangan').each(function() {
                tambahHargaLapanganArr.push($(this).val());
            });
            let tambahJenisLapanganArr = new Array();
            $('.tambah_jenis_lapangan').each(function() {
                tambahJenisLapanganArr.push($(this).val());
            });
            let counterHarga = 0,
                counterNama = 0;
            let counterHargaT = 0,
                counterNamaT = 0;
            $.each(hargaLapanganArr, function(key, value) {
                if (value == "") {
                    counterHarga = 1;
                    return false;
                } else {
                    counterHarga = 0;
                }
            });
            $.each(namaLapanganArr, function(key, value) {
                if (value == "") {
                    counterNama = 1;
                    return false;
                } else {
                    counterNama = 0;
                }
            });
            $.each(tambahNamaLapanganArr, function(key, value) {
                if (value == "") {
                    counterNamaT = 1;
                    return false;
                } else {
                    counterNamaT = 0;
                }
            });
            $.each(tambahHargaLapanganArr, function(key, value) {
                if (value == "") {
                    counterHargaT = 1;
                    return false;
                } else {
                    counterHargaT = 0;
                }
            });
            let counterBig = counterHarga + counterNama + counterHargaT + counterNamaT;
            // console.log(counterNama);
            // console.log(counterHarga);
            // console.log(counterNamaT);
            // console.log(counterHargaT);
            // console.log(counterBig);
            if (counterBig == 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('arena/edit_lapangan'); ?>",
                    data: {
                        'nama_lapangan': namaLapanganArr,
                        'id_lapangan': idLapanganArr,
                        'jenis_lapangan': jenisLapanganArr,
                        'harga_lapangan': hargaLapanganArr,
                        'tambah_nama_lapangan': tambahNamaLapanganArr,
                        'tambah_harga_lapangan': tambahHargaLapanganArr,
                        'tambah_jenis_lapangan': tambahJenisLapanganArr,
                    },
                    success: function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data lapangan berhasil diperbarui',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#button-save-lapangan').hide();
                        $('#button-tambah-lapangan').hide();
                        $('#button-edit-lapangan').show();
                        $('.edit_data_lapangan').attr('readonly', 'readonly');
                        $('.edit_harga_lapangan').attr('readonly', 'readonly');
                        $('.edit_jenis_lapangan').attr('disabled', 'true');
                        $('.tambah_data_lapangan').attr('readonly', 'readonly');
                        $('.tambah_jenis_lapangan').attr('disabled', 'true');
                        $('.tambah_harga_lapangan').attr('readonly', 'readonly');
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Harap isi semua kolom'
                });
            }
        });
        $('#button-tambah-lapangan').click(function() {
            let index = $('.jml_edit').length;
            let item = `<li class="list-group-item mt-2">
                                    <label id="" class="tambah_lapangan_label">Lapangan ${index+1}</label>
                                    <input type="text" name="tambah_lapangan_arena[]" class="form-control tambah_data_lapangan" aria-describedby="emailHelp" placeholder="Silahkan masukkan nama lapangan">
                                    <label class="mt-3">Jenis Lapangan</label>
                                    <select class="form-control tambah_jenis_lapangan">
                                        <option disabled value="0">Pilih Jenis Lapangan</option>
                                        <option selected value="Reguler">Reguler</option>
                                        <option value="Premium">Premium</option>
                                    </select>
                                    <label class="mt-3">Harga</label>
                                    <input type="text" name="tambah_harga_lapangan[]" class="form-control tambah_harga_lapangan" aria-describedby="emailHelp" placeholder="Silahkan masukkan harga">
                                </li>`;
            $('#edit-lapangan').append(item);
        });
        $('#button-save-jadwal').hide();
        $('.button-tutup-jadwal').hide();
        $('.button-buka-jadwal').hide();
        $('#button-edit-jadwal').click(function() {
            $('#button-edit-jadwal').hide();
            $('#button-save-jadwal').show();
            // $('.button-tutup-jadwal').show();
            let data = new Array();
            $('.hari').each(function() {
                let single_row = new Array();
                single_row.push($(this).attr('id'));
                let jadwal = $(this).find('.edit_data_jadwal');
                jadwal.each(function() {
                    single_row.push($(this).val());
                });
                data.push(single_row);
            });
            data.forEach(row => {
                console.log(row[0]);
                if ((row[1] == "") && (row[2] == "")) {
                    $(`#${row[0]}`).find('.button-buka-jadwal').show();
                } else {
                    $(`#${row[0]}`).find('.button-tutup-jadwal').show();
                    $(`#${row[0]}`).find('.edit_data_jadwal').removeAttr('disabled');
                }
            });

        });
        $('.button-tutup-jadwal').click(function() {
            let id = $(this).parents('.hari').attr('id');
            let item = $(`#${id} input`);
            item.each(function() {
                $(this).attr('value', null);
                $(this).attr('disabled', 'disabled');
            });
            $('#button-edit-jadwal').hide();
            $('#button-save-jadwal').show();
            $(`#${id} .button-buka-jadwal`).show();
            $(this).hide();
        });
        $('.button-buka-jadwal').click(function() {
            let id = $(this).parents('.hari').attr('id');
            let item = $(`#${id} input`);
            item.each(function() {
                $(this).removeAttr('disabled');
                $(this).attr('value', '00:00');
            });
            $('#button-edit-jadwal').hide();
            $('#button-save-jadwal').show();
            $(`#${id} .button-tutup-jadwal`).show();
            $(this).hide();
        });
        $('#button-save-jadwal').click(function() {
            let data = new Array();
            $('.hari').each(function() {
                let single_row = new Array();
                single_row.push($(this).attr('id').substring(1));
                let jadwal = $(this).find('.edit_data_jadwal');
                jadwal.each(function() {
                    single_row.push($(this).val());
                });
                data.push(single_row);
            });
            console.log(data);
            let counter;
            $.each(data, function(index, row) {
                if (row[1] != "" && row[2] != "") {
                    if (row[1] < row[2]) {
                        counter = 0;
                    } else {
                        counter = 1;
                        return false;
                    }
                } else {
                    counter = 0;
                }
            });
            if (counter == 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('arena/simpan_jadwal'); ?>",
                    data: {
                        'jadwalArr': data,
                    },
                    success: function(res) {
                        console.log(res);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data lapangan berhasil diperbarui',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('.btn-jadwal').hide();
                        $('#button-edit-jadwal').show();
                        $('#button-save-jadwal').hide();
                        $('#edit-jadwal input').attr('disabled', 'disabled');
                    },
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Harap masukkan jam buka dan jam tutup yang benar'
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>