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
                    <li class="list-group-item list-info-akun"><a href="#anggota">Anggota Tim</a></li>
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
                    <form class="p-0 m-0" id="edit_akun" action="<?php echo site_url('team/edit_info'); ?>" method="post">
                        <div class="form-group">
                            <label for="edit_nama_team">Nama Tim</label>
                            <input type="text" name="edit_nama_team" class="form-control edit_akun" id="edit_nama_team" aria-describedby="emailHelp" placeholder="Silahkan masukkan email Anda" value="<?= $tim['nama_team']; ?>" readonly='readonly'>
                        </div>
                        <div class="form-group">
                            <label for="edit_kontak_team">Kontak Tim</label>
                            <input type="text" name="edit_kontak_team" class="form-control edit_akun" id="edit_kontak_team" placeholder="Masukkan No HP Anda" value='<?= $tim['no_hp']; ?>' readonly='readonly'>
                        </div>
                        <div class="form-group">
                            <label for="edit_email_team">Email Tim</label>
                            <input type="text" name="edit_email_team" class="form-control edit_akun" id="edit_email_team" placeholder="Mohon isi email Anda" value="<?= $tim['email_team']; ?>" readonly='readonly'>
                        </div>
                        <div class="form-group">
                            <label for="edit_deskripsi_team">Deskripsi Tim</label>
                            <!-- <input type="text" name="edit_deskripsi_team" class="form-control edit_akun" id="edit_deskripsi_team" placeholder="Mohon isi deskripsi Tim Anda" value="<?= $tim['deskripsi']; ?>" readonly='readonly'> -->
                            <textarea class="form-control edit_akun" id="edit_deskripsi_team" placeholder="Mohon isi deskripsi Tim Anda" name="edit_deskripsi_team" rows="3" readonly='readonly'><?= $tim['deskripsi']; ?></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div id="anggota" class=" row mb-5 bg-white">
                <div class="col-12 ">
                    <p class="d-inline-block article-header mb-2">Anggota Tim</p>
                    <div class="btn-group float-right mb-2" role="group">
                        <button class="btn btn-primary" id="button-edit-anggota" type="button">Ubah</button>
                        <button class="btn btn-primary" id="button-tambah-anggota" type="button">Tambah</button>
                        <button class="btn btn-success" id="button-save-anggota" type="button">Simpan</button>
                    </div>
                    <hr class="hr-line2">
                    <form action="p-0 m-0" class="edit_anggota" action="<?php echo site_url('team/edit_anggota'); ?>" method="post">
                        <ul class="list-group" id="edit-anggota">
                            <?php $no; ?>
                            <?php foreach ($anggota as $index => $a) : ?>
                                <li class="list-group-item">
                                    <label id="<?= $a['anggota_id']; ?>" class="anggota_label">Anggota <?= $index + 1; ?></label>
                                    <input type="text" name="edit_anggota_team[]" class="form-control edit_data_anggota" aria-describedby="emailHelp" placeholder="Silahkan nama anggota Tim Anda" readonly='readonly' value="<?= $a['nama_anggota']; ?>">
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </form>
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
        $('#button-save-anggota').hide();
        $('#button-tambah-anggota').hide();
        $('#button-edit').click(function() {
            $('.edit_akun').removeAttr('readonly');
            $('#button-edit').hide();
            $('#button-save').show();
        });
        $('#button-save').click(function() {
            $('.edit_akun').attr('readonly', 'readonly');
            console.log($('#edit_deskripsi_team').val());
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('team/edit_info'); ?>",
                data: {
                    'edit_nama_team': $('#edit_nama_team').val(),
                    'edit_kontak_team': $('#edit_kontak_team').val(),
                    'edit_email_team': $('#edit_email_team').val(),
                    'edit_deskripsi_team': $('#edit_deskripsi_team').val()
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
        $('#button-edit-anggota').click(function() {
            $('.edit_data_anggota').removeAttr('readonly');
            $('#button-edit-anggota').hide();
            $('#button-save-anggota').show();
            $('#button-tambah-anggota').show();
        });
        $('#button-save-anggota').click(function() {
            let namaAnggotaArr = new Array();
            $('.edit_data_anggota').each(function() {
                namaAnggotaArr.push($(this).val());
            });
            let idAnggotaArr = new Array();
            if (('.anggota_label').length != 0) {
                $('.anggota_label').each(function() {
                    idAnggotaArr.push($(this).attr('id'));
                });
            } else {
                idAnggotaArr = null;
                namaAnggotaArr = null;
            }
            let tambahNamaAnggotaArr = new Array();
            $('.tambah_data_anggota').each(function() {
                tambahNamaAnggotaArr.push($(this).val());
            });
            let counterNama = 0;
            let counterNamaT = 0;
            $.each(namaAnggotaArr, function(key, value) {
                if (value == "") {
                    counterNama = 1;
                    return false;
                } else {
                    counterNama = 0;
                }
            });
            $.each(tambahNamaAnggotaArr, function(key, value) {
                if (value == "") {
                    counterNamaT = 1;
                    return false;
                } else {
                    counterNamaT = 0;
                }
            });

            let counterBig = counterNama + counterNamaT;
            console.log(counterNama);
            console.log(counterNamaT);
            console.log(counterBig);
            if (counterBig == 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('team/edit_anggota'); ?>",
                    data: {
                        'nama_anggota': namaAnggotaArr,
                        'id_anggota': idAnggotaArr,
                        'tambah_nama_anggota': tambahNamaAnggotaArr
                    },
                    success: function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data anggota tim berhasil diperbarui',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('.edit_data_anggota').attr('readonly', 'readonly');
                        $('.tambah_data_anggota').attr('readonly', 'readonly');
                        $('#button-save-anggota').hide();
                        $('#button-tambah-anggota').hide();
                        $('#button-edit-anggota').show();
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
        $('#button-tambah-anggota').click(function() {
            let index = $('.edit_data_anggota').length;
            let item = `<li class="list-group-item"><label id =""class="tambah_anggota_label"> Anggota ${++index} </label><input type ="text" name = "tambah_anggota_team[]" class = "form-control tambah_data_anggota" aria - describedby = "emailHelp" placeholder = "Silahkan masukkan nama anggota Tim Anda" ></li>`;
            $('#edit-anggota').append(item);
        })
    });
</script>
<?= $this->endSection(); ?>