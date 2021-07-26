$(document).ready(function() {
    $('.decimal').keyup(function() {
        var position = this.selectionStart - 1;
        //remove all but number and .
        var fixed = this.value.replace(/[^0-9\.]/g, "");
        if (fixed.charAt(0) === ".")
        //can't start with .
            fixed = fixed.slice(1);

        var pos = fixed.indexOf(".") + 1;
        if (pos >= 0)
        //avoid more than one .
            fixed = fixed.substr(0, pos) + fixed.slice(pos).replace(".", "");

        if (this.value !== fixed) {
            this.value = fixed;
            this.selectionStart = position;
            this.selectionEnd = position;
        }
    });


    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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
    var table = $('#TabelPegawai').DataTable({
        destroy: true,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
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
            "url": BASE_URL + "/pegawai/json_pegawai",
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [{
                "data": "no_urut_jbt",
                "orderable": true,
            },
          
            {
                "orderable": false,
                "data": function(data, type, row, meta, dataToSet) {
                    if (data.penilai == 1) {
                        return '<div class="text-left">' + data.nama + '<br><span class="badge badge-info">Pejabat Penilai</span> </div>'

                    } else {
                        return '<div class="text-left">' + data.nama + ' </div>'

                    }

                }
            },
            {
                "orderable": false,
                "data": function(data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.nm_jbt + ' </div>'

                }
            },

            {
                "orderable": false,
                "data": function(data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.username + ' </div>'

                }
            },
            {
                "orderable": false,
                "data": function(data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.pangkat_gol + ' </div>'

                }
            },



            {
                "orderable": false,
                "data": function(data, type, row, meta, dataToSet) {
                    return '<div class="text-center"><div class="button-group">' +
                        '<button type="button" class="btn waves-effect waves-light btn-outline-info" onClick="EditPegawai(this)" data-id="' + data.id_user + '"><i class="mdi mdi-border-color"></i></button>' +
                        '<button type="button" class="btn waves-effect waves-light btn-outline-danger" onClick="DelPegawai(this)" data-id="' + data.id_user + '"><i class="mdi mdi-delete"></i></button>' +
                        '<button type="button" class="btn waves-effect waves-light btn-outline-warning" onClick="ResetPassword(this)" data-id="' + data.id_user + '" title="Reset Password"><i class="mdi mdi-reload"></i></button>' +
                        '</div></div>'

                }
            },

        ],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });

});

$("#nip").on("keyup", function() {
    var maxLength = $(this).attr("maxlength");
    if (maxLength < $(this).val().length) {
        swal({
            type: 'warning',
            title: 'NIP tidak boleh dari 18 Karakter',
            timer: 2000,
        })
    }

})

$('#FormTambahPegawai').on('submit', function(e) {

    var postData = new FormData($("#FormTambahPegawai")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "pegawai/post_pegawai",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function(data) {
            swal({
                type: 'success',
                title: 'Simpan',
                text: 'Berhasil Simpan Data',
                timer: 2000,
            })
            $('#ModalTambahPegawai').modal('hide');
            $('#TabelPegawai').DataTable().ajax.reload(null, false);

        },
        error: function(data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelPegawai').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

function EditPegawai(elem) {
    var id = $(elem).data("id");


    $.ajax({
        url: BASE_URL + "pegawai/get_pegawai/" + id,
        method: "GET",

        async: false,
        dataType: 'json',
        success: function(data) {

            $('#ModalEditPegawai').modal('show');
            $('#id_user').val(data['id_user']);
            $('#nama_edit').val(data['nama']);
            $('#nip_edit').val(data['username']);

            $('#penilai_edit').val(data['penilai']);
            $('#id_jbt_edit').val(data['id_jbt']);
            $('#pangkat_gol_peg_edit').val(data['pangkat_gol']);

            $('#id_penilai_edit').val(data['id_penilai']);
            $('#email_edit').val(data['email']);

        }
    });


}

$('#FormEditPegawai').on('submit', function(e) {

    var postData = new FormData($("#FormEditPegawai")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "pegawai/edit_pegawai",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function(data) {
            swal({
                type: 'success',
                title: 'Simpan',
                text: 'Berhasil Simpan Data',
                timer: 2000,
            })
            $('#ModalEditPegawai').modal('hide');
            $('#TabelPegawai').DataTable().ajax.reload(null, false);

        },
        error: function(data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelPegawai').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

function DelPegawai(elem) {

    var id = $(elem).data("id");

    swal({
        title: 'Hapus  ?',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'YA',

        closeOnConfirm: false,
    }, function(isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: BASE_URL + 'pegawai/del_peg/',
            type: "POST",
            data: {

                id: id,


            },
            success: function() {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data dihapus',
                    timer: 2000,
                })
                $('#TabelPegawai').DataTable().ajax.reload(null, false);

            },
            error: function(xhr, ajaxOptions, thrownError) {

                swal({
                    type: 'warning',
                    title: 'Berhasil',
                    text: 'Data dihapus',
                    timer: 2000,
                })
                $('#TabelPegawai').DataTable().ajax.reload(null, false);

            }
        });
    });
}

function ResetPassword(elem) {
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
            url: BASE_URL + 'pegawai/reset_pass/',
            type: "POST",
            data: {

                id: id,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Password direset "PNtamianglayang"',
                    timer: 2000,
                })
                $('#TabelPegawai').DataTable().ajax.reload(null, false);
            },
            error: function () {
                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: '',
                    timer: 3000,
                })

            },

        })
    });


    return false;
}

