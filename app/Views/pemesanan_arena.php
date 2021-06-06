<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-5 pt-2">
    <div class="row mt-5">
        <div class="col-3 col-fluid " style="height: 300px;">
            <h2 class="content-header p-0 mb-2">Pemesanan Lapangan</h2>
            <div class="p-3 bg-dark">
                <ul class="list-group">
                    <li class="list-group-item list-info-akun"><a href="#informasi">Belum Dikonfirmasi</a></li>
                    <li class="list-group-item list-info-akun"><a href="#lapangan">Sudah Dikonfirmasi</a></li>
                    <hr class="hr-line">
                    <!-- <li class="list-group-item list-info-akun"><a href="#jadwal">History</a></li>
                    <hr class="hr-line"> -->
                </ul>
            </div>

        </div>

        <div class="col-9 mt-5">
            <div id="informasi" class="row mb-5 bg-white">

                <div class="col-12 ">
                    <p class="d-inline-block article-header mb-2">Belum Dikonfirmasi</p>
                    <hr class="hr-line2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Lapangan</th>
                                <th scope="col">Pemesan</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($jadwal as $index => $value) :
                                $converted_time = date_parse($value['durasi']);
                                $converted_date = date("D, d M Y", strtotime($value['tanggal_main']));
                            ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td><?= $converted_date; ?></td>
                                    <td class="jam_main"><?= $value['jam_main']; ?></td>
                                    <td class="durasi_main"><?= $converted_time['hour']; ?> jam</td>
                                    <td><?= $value['nama_lapangan']; ?></td>
                                    <td><?= $value['nama_team']; ?></td>
                                    <td><button class="btn filter detail-pesanan" id="detail<?= $value['book_id']; ?>" type="button" data-toggle="modal" data-target="#detailModal">Detail</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="lapangan" class=" row mb-5 bg-white">

                <div class="col-12 ">
                    <p class="d-inline-block article-header mb-2">Sudah Dikonfirmasi</p>
                    <hr class="hr-line2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Lapangan</th>
                                <th scope="col">Pemesan</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($jadwal2 as $index => $value) :
                                $converted_time = date_parse($value['durasi']);
                                $converted_date = date("D, d M Y", strtotime($value['tanggal_main']));
                            ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td><?= $converted_date; ?></td>
                                    <td class="jam_main"><?= $value['jam_main']; ?></td>
                                    <td class="durasi_main"><?= $converted_time['hour']; ?> jam</td>
                                    <td><?= $value['nama_lapangan']; ?></td>
                                    <td><?= $value['nama_team']; ?></td>
                                    <td><button class="btn filter detail-pesanan-fix" id="detail<?= $value['book_id']; ?>" type="button" data-toggle="modal" data-target="#detailModalFix">Detail</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailModal">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" id="tolak">Tolak Pesanan</button>
                    <button type="button" class="btn filter" id="terima">Terima Pesanan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailModalFix">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-item-fix">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        function format_tanggal(date) {
            let mydate = new Date(date);
            let month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ][mydate.getMonth()];
            let str = mydate.getDate() + ' ' + month + ' ' + mydate.getFullYear();
            return str;
        }
        $('.detail-pesanan').click(function() {
            let id_pemesanan = $(this).attr('id').substring(6);
            let jam_main = $(this).parent().siblings('.jam_main').text();
            let durasi_main = $(this).parent().siblings('.durasi_main').text();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('arena/get_detail_pesanan'); ?>",
                data: {
                    'id': id_pemesanan,
                },
                dataType: 'JSON',
                success: function(res) {
                    let durasi = parseInt(durasi_main.substr(0, 2));
                    console.log(durasi);
                    let harga = parseInt(res.harga) * durasi;
                    console.log(harga);
                    let tgl_main = format_tanggal(res.tanggal_main);
                    let tgl_book = format_tanggal(res.tanggal_book);
                    console.log(res.tanggal_book);
                    let view_modal = `<div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="font-weight-bold">Id Pemesanan</p>
                                <p class="font-weight-bold">Tanggal Main</p>
                                <p class="font-weight-bold">Jam Main</p>
                                <p class="font-weight-bold">Durasi</p>
                                <p class="font-weight-bold">Lapangan</p>
                                <p class="font-weight-bold">Harga</p>
                                <p class="font-weight-bold">Nama Team</p>
                                <p class="font-weight-bold">Tanggal Booking</p>
                                <p class="font-weight-bold">Jam Booking</p>
                            </div>
                            <div class="col-md-6">
                                <p class="">${res.book_id}</p>
                                <p class="">${tgl_main}</p>
                                <p class="">${jam_main}</p>
                                <p class="">${durasi_main}</p>
                                <p class="">${res.nama_lapangan}</p>
                                <p class="">${harga}</p>
                                <p class="">${res.nama_team}</p>
                                <p class="">${tgl_book}</p>
                                <p>${res.tanggal_book.substr(11)}</p>
                            </div>
                        </div>
                    </div>`
                    $('.modal-item').html(view_modal);
                    $('#terima').unbind().bind('click', function() {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('arena/terima_pesanan'); ?>",
                            data: {
                                'id': id_pemesanan,
                            },
                            success: function() {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Pemesanan berhasil diterima!',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    });
                    $('#tolak').click(function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Apakah Anda yakin ingin menolak pesanan ini?',
                            showDenyButton: true,
                            showConfirmButton: true
                        }).then((result) => {
                            $('#detailModal').modal('hide');
                            if (result.isConfirmed) {
                                Swal.fire('Pesanan berhasil ditolak', '', 'success');
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo site_url('arena/tolak_pesanan'); ?>",
                                    data: {
                                        'id': id_pemesanan,
                                    },
                                });
                                location.reload();
                            }
                        });
                    });
                },
            });
        });
        $('.detail-pesanan-fix').click(function() {
            let id_pemesanan = $(this).attr('id').substring(6);
            let jam_main = $(this).parent().siblings('.jam_main').text();
            let durasi_main = $(this).parent().siblings('.durasi_main').text();
            console.log(id_pemesanan);
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('arena/get_detail_pesanan'); ?>",
                data: {
                    'id': id_pemesanan,
                },
                dataType: 'JSON',
                success: function(res) {
                    let durasi = parseInt(durasi_main.substr(0, 2));
                    console.log(durasi);
                    let harga = parseInt(res.harga) * durasi;
                    console.log(harga);
                    let tgl_main = format_tanggal(res.tanggal_main);
                    let tgl_book = format_tanggal(res.tanggal_book);
                    console.log(res.tanggal_book);
                    let view_modal = `<div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="font-weight-bold">Id Pemesanan</p>
                                <p class="font-weight-bold">Tanggal Main</p>
                                <p class="font-weight-bold">Jam Main</p>
                                <p class="font-weight-bold">Durasi</p>
                                <p class="font-weight-bold">Lapangan</p>
                                <p class="font-weight-bold">Harga</p>
                                <p class="font-weight-bold">Nama Team</p>
                                <p class="font-weight-bold">Tanggal Booking</p>
                                <p class="font-weight-bold">Jam Booking</p>
                            </div>
                            <div class="col-md-6">
                                <p class="">${res.book_id}</p>
                                <p class="">${tgl_main}</p>
                                <p class="">${jam_main}</p>
                                <p class="">${durasi_main}</p>
                                <p class="">${res.nama_lapangan}</p>
                                <p class="">${harga}</p>
                                <p class="">${res.nama_team}</p>
                                <p class="">${tgl_book}</p>
                                <p>${res.tanggal_book.substr(11)}</p>
                            </div>
                        </div>
                    </div>`
                    $('.modal-item-fix').html(view_modal);
                },
            });
        });
    });
</script>
<?= $this->endSection(); ?>