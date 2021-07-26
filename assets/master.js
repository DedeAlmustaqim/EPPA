$(document).ready(function () {
    /* Formatting function for row details - modify as you need */

    $("#modal-set-op").on('hide.bs.modal', function (e) {
        $('#tabel-set-op').dataTable().fnClearTable();
        $('#tabel-set-op').dataTable().fnDestroy();

    });
    $("#ModalJadwal").on('hide.bs.modal', function (e) {
        $(this).find('form')[0].reset();
    });

    $("#modal-tambah-unit").on('hide.bs.modal', function (e) {
        $(this).find('form')[0].reset();
    });



    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    var table = $('#TabelBulan').DataTable({
        destroy: true,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": true,
        "columnDefs": [{
            "visible": false,

        }],
        "order": [
            [0, 'asc']
        ],

        "language": {
            "lengthMenu": "Tampilkan _MENU_ item per halaman",
            "zeroRecords": "Tidak ada data yang ditampilkan",
            "info": "Menampilkan Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data yang ditampilkan",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            },
        },
        "displayLength": 25,
        "ajax": {
            "url": BASE_URL + "/master/json_bln",
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [
            {
                "data": "id_bln",
                "orderable": true,
            },
            {
                "orderable": false,

                "data": function (data, type, row, meta, dataToSet) {
                    if (data.kunci_bln == 0) {
                        var kcbln = '<span class="label label-danger">Input Data Terkunci</span>'
                    } else if (data.kunci_bln == 1) {
                        var kcbln = '<span class="label label-success">Input Data Terjadwal</span>'

                    }

                    if (data.kunci_verif == 0) {
                        var kcverif = '<span class="label label-danger">Verifikasi Data Terkunci</span>'
                    } else if (data.kunci_verif == 1) {
                        var kcverif = '<span class="label label-success">Verifikasi Data Terjadwal</span>'

                    }

                    return '<div class="text-left"><h2>' + data.nm_bln + '</h2> ' + kcbln + '&nbsp;' + kcverif + ' </div > '

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.tgl1 == null) {
                        return '<div class="text-center"><small class="text-warning">Mohon Setting Tanggal</small></div>'
                    } else {
                        return '<div class="text-center">' + data.tgl1 + ' Pukul ' + data.wkt1 + '<br>s/d<br>' + data.tgl2 + ' Pukul ' + data.wkt2 + '</div>'

                    }
                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.tgl_awal_verif == null) {
                        return '<div class="text-center"><small class="text-warning">Mohon Setting Tanggal</small></div>'
                    } else {
                        return '<div class="text-center">' + data.tgl_awal_verif + ' Pukul ' + data.pukul_awal_verif + '<br>s/d<br>' + data.tgl_akhir_verif + ' Pukul ' + data.pukul_akhir_verif + '</div>'

                    }
                }
            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="btn-group">' +
                        '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        'Jadwal' +
                        '</button>' +
                        '<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">' +
                        '<a href="#" class="dropdown-item jadwal-input" data-toggle="modal" data-target="#ModalJadwalInput" data-id="' + data.id_bln + '" data-bln="' + data.nm_bln + '" data-awal="' + data.tgl1 + '" data-akhir="' + data.tgl2 + '" data-wkt1="' + data.wkt1 + '" data-wkt2="' + data.wkt2 + '">Jadwal Input</a> ' +
                        '<a href="#" class="dropdown-item jadwal-verif" data-toggle="modal" data-target="#ModalJadwalVerif" data-id="' + data.id_bln + '" data-bln="' + data.nm_bln + '" data-awal="' + data.tgl_awal_verif + '" data-akhir="' + data.tgl_akhir_verif + '" data-wkt1="' + data.pukul_awal_verif + '" data-wkt2="' + data.pukul_akhir_verif + '">Jadwal Verifikasi</a> ' +
                        '</div>' +
                        '</div>'
                    //'<div class="text-center">' +
                    //'<a href="#" class="btn waves-effect waves-light btn-success jadwal" data-toggle="modal" data-target="#ModalJadwalInput" data-id="' + data.id_bln + '" data-bln="' + data.nm_bln + '" data-awal="' + data.tgl1 + '" data-akhir="' + data.tgl2 + '" data-wkt1="' + data.wkt1 + '" data-wkt2="' + data.wkt2 + '">Jadwal</a> ' +
                    //'<a href="#" class="btn waves-effect waves-light btn-danger" onClick="HapusJadwal(this)" data-id="' + data.id_bln + '" data-bln="' + data.nm_bln + '" data-awal="' + data.tgl1 + '" data-akhir="' + data.tgl2 + '">Hapus Jadwal</a></div>'

                }
            },



        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });


});



$('#TabelBulan').on('click', '.jadwal-input', function () {
    var id = $(this).data('id');
    var bln = $(this).data('bln');
    var awal = $(this).data('awal');
    var akhir = $(this).data('akhir');
    var wkt1 = $(this).data('wkt1');
    var wkt2 = $(this).data('wkt2');

    $('#IdBln').val(id);
    $('#TglAwal').val(awal);
    $('#TglAkhir').val(akhir);
    $('#WktInputAwal').val(wkt1);
    $('#WktInputAkhir').val(wkt2);


    document.getElementById('NmBln').innerHTML = bln;
});

$('#TabelBulan').on('click', '.jadwal-verif', function () {
    var id = $(this).data('id');
    var bln = $(this).data('bln');
    var awal = $(this).data('awal');
    var akhir = $(this).data('akhir');
    var wkt1 = $(this).data('wkt1');
    var wkt2 = $(this).data('wkt2');

    $('#IdBlnVerif').val(id);
    $('#TglAwalVerif').val(awal);
    $('#TglAkhirVerif').val(akhir);
    $('#WktVerifAwal').val(wkt1);
    $('#WktVerifAkhir').val(wkt2);


    document.getElementById('NmBln').innerHTML = bln;
});

$('#FormJadwal').on('submit', function (e) {
    var postData = new FormData($("#FormJadwal")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "master/jadwal",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {
            swal({
                type: 'success',
                title: 'Simpan',
                text: 'Berhasil Simpan Data',
                timer: 2000,
            })
            $('#ModalJadwalInput').modal('hide');
            $('#TabelBulan').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelBulan').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});
function UbahPass(elem) {
    var id = $(elem).data("id");


    $('#ModalUbahPass').modal('show');
    $('#id_user_pass').val(id);

}
$('.pass').hover(function () {
    $('#pass').attr('type', 'text');
}, function () {
    $('#pass').attr('type', 'password');
});

$('.pass2').hover(function () {
    $('#pass2').attr('type', 'text');
}, function () {
    $('#pass2').attr('type', 'password');
});
$('#FormUbahPass').on('submit', function (e) {
    var postData = new FormData($("#FormUbahPass")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "profil/ubah_pass",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {
            swal({
                type: 'success',
                title: 'Simpan',
                text: 'Berhasil Simpan Data',
                timer: 2000,
            })
            $('#ModalUbahPass').modal('hide');
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelBulan').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});
$('#FormJadwalVerif').on('submit', function (e) {
    var postData = new FormData($("#FormJadwalVerif")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "master/jadwal_verif",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {
            swal({
                type: 'success',
                title: 'Simpan',
                text: 'Berhasil Simpan Data',
                timer: 2000,
            })
            $('#ModalJadwalVerif').modal('hide');
            $('#TabelBulan').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelBulan').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});






function HapusJadwal(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");
    swal({
        title: 'Hapus.?',
        text: nm,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'YA',

        closeOnConfirm: false,
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: BASE_URL + 'master/hapus_jadwal/',
            type: "POST",
            data: {

                id: id,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data dihapus',
                    timer: 2000,
                })
                $('#TabelBulan').DataTable().ajax.reload(null, false);
            },
            error: function () {
                swal({
                    type: 'warning',
                    title: 'Gagal',
                    timer: 3000,
                })

            }
        });
    });

}

function ResetPassUser(elem) {
    var id = $(elem).data("id");
    swal({
        title: 'Yakin Reset Password.?',
        text: '',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'YA',

        closeOnConfirm: false,
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: BASE_URL + 'user/reset_pass/',
            type: "POST",
            data: {

                id: id,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data dihapus',
                    timer: 2000,
                })
                $('#tabel-admin').DataTable().ajax.reload(null, false);
            },
            error: function () {
                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Operator Gagal dihapus',
                    timer: 3000,
                })

            }
        });
    });

}

$('#form-tambah-user').on('submit', function (e) {

    e.preventDefault();
    var postData = new FormData($("#form-tambah-user")[0]);
    //var postData = new FormData($("#form-tambah-smohongd")[1]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "user/tambah_user",
        processData: false,
        contentType: false,
        data: postData, //penggunaan FormData
        //  AMBIL VARIABEL
        dataType: "JSON",
        success: function () {
            swal({
                type: 'success',
                title: 'Berhasil',
                text: 'Data dihapus',
                timer: 2000,
            })
            $('#modal-tambah-user').modal('hide');
            $('#tabel-admin').DataTable().ajax.reload(null, false);
        },
        error: function () {
            swal({
                type: 'warning',
                title: 'Gagal Simpan Data',
                text: '',
                timer: 3000,
            })

        },

    })
    return false;
});

$('#tabel-admin').on('click', '.edit', function () {
    var id = $(this).data('id');
    $.ajax({
        type: "POST",
        "url": BASE_URL + 'user/get_user/' + id,
        dataType: "JSON",
        success: function (data) {
            $('#id_user').val(data['id_user']);
            $('#username_edit').val(data['username']);
            $('#nm_user_edit').val(data['nama']);
            $('#nip_user_edit').val(data['nip']);
            $('#email_user_edit').val(data['email']);
            $('#hak_akses_edit').val(data['id_akses']);
        }
    });

});

$('#form-edit-user').on('submit', function (e) {

    e.preventDefault();
    var postData = new FormData($("#form-edit-user")[0]);
    //var postData = new FormData($("#form-tambah-smohongd")[1]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "user/edit_user",
        processData: false,
        contentType: false,
        data: postData, //penggunaan FormData
        //  AMBIL VARIABEL
        dataType: "JSON",
        success: function () {
            swal({
                type: 'success',
                title: 'Berhasil',
                text: 'Data dihapus',
                timer: 2000,
            })
            $('#modal-edit-user').modal('hide');
            $('#tabel-admin').DataTable().ajax.reload(null, false);
        },
        error: function () {
            swal({
                type: 'warning',
                title: 'Gagal Simpan Data',
                text: '',
                timer: 3000,
            })

        },

    })
    return false;
});
