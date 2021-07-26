$(document).ready(function () {




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






    var table = $('#TabelKeg').DataTable({
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
            "url": BASE_URL + "pkp/json_keg/" + IdIndikator,
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [
            //1
            {
                "data": "urut_keg",
                "orderable": true,
            },
            //2
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.keg + '</div>'

                }
            },
            //3
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.ak_target + '</div>'

                }
            },
            //4
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.output_target + '</div>'

                }
            },
            //5
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.satuan_target + '</div>'

                }
            },
            //6
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.mutu_target + '</div>'

                }
            },
            //7
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.ak_real + '</div>'

                }
            },
            //8
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.output_real + '</div>'

                }
            },
            //9
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.satuan_real + '</div>'

                }
            },
            //10
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.mutu_real + '</div>'

                }
            },
            //11
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.nilai_kin_keg + '</div>'

                }
            },
            //12
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' +
                        '<button type="button" onClick="EditKeg(this)" data-kc="' + data.kunci_bln + '" data-id="' + data.id_keg + '"  data-id_ind="' + data.id_indikator + '" class="btn waves-effect waves-light btn-sm btn-info"><i class="mdi mdi-pencil"></i></button>&nbsp' +
                        '<button type="button" onClick="DelKeg(this)"  data-kc="' + data.kunci_bln + '" data-id="' + data.id_keg + '" data-id_indikator="' + data.id_indikator + '" data-nilai="' + data.nilai_kin_keg + '" class="btn waves-effect waves-light btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>' +
                        '</div>'

                }
            },
        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        },

    });

});
$('#bln').ready(function () {
    var id_bln = $(this).val();

    TabelPkp(id_bln)
    $('#TabelPkp').DataTable().ajax.reload(null, false);


});

$('#bln').change(function () {
    var id_bln = $(this).val();

    TabelPkp(id_bln)
    $('#TabelPkp').DataTable().ajax.reload(null, false);
});

function TabelPkp(id_bln) {
    if (id_bln == 0) {
        var bln = 0
    } else {
        var bln = id_bln
    }
    var table = $('#TabelPkp').DataTable({
        destroy: true,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": true,
        "columnDefs": [{
            "visible": false,
            "targets": [0, 1],

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
            "url": BASE_URL + "/pkp/json_pkp/" + bln,
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [{
            "data": "id_bln",
            "orderable": true,
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.nilai_pkp == null) {
                    var nilaipkp = "-";
                } else {
                    var nilaipkp = data.nilai_pkp;

                }
                if (data.nilai_pkp == 0.00) {
                    var mutu = "<h3 class='text-danger'>-</h3>"
                } else if (data.nilai_pkp <= 50) {
                    var mutu = "<h3 class='text-danger'>Buruk</h3>"

                } else if (data.nilai_pkp <= 60) {
                    var mutu = "<h3 class='text-warning'>Sedang</h3>"

                } else if (data.nilai_pkp <= 75) {
                    var mutu = "<h3 class='text-info'>Cukup</h3>"

                } else if (data.nilai_pkp <= 90.99) {
                    var mutu = "<h3 class='text-success'>Baik</h3>"

                } else {
                    var mutu = "<h3 class='text-success'>Sangat Baik</h3>"
                }
                if (data.stts_pkp == 1) {
                    if (data.kunci_bln == 0) {
                        return '<div class="row">' +
                            '<div class="col-3 text-left">' +
                            '<h4>' + data.nm_bln + '</h4> <span class="badge badge-warning">Status : Terkunci</span>' +
                            '</div>' +
                            '<div class="col-4 text-center">' +
                            'Hasil Capaian Kinerja ' + data.nm_bln + '<h3>' + nilaipkp + '</h3>' +
                            '</div>' +
                            '<div class="col-3 text-center">' +
                            'Mutu' + mutu +
                            '</div>' +
                            '<div class="col-2 text-center">' +
                            '<div class="button-group">' +
                            '<a href="' + BASE_URL + 'pkp/cetak_pkp/' + data.id_pkp + '" target="_blank" class="btn waves-effect waves-light btn-warning" title="Cetak"><i class="mdi mdi-printer"></i> Cetak</a>&nbsp;' +
                            '</div>' +
                            '</div>' +
                            '</div>'

                    } else if (data.kunci_bln == 1) {
                        return '<div class="row">' +
                            '<div class="col-3 text-left">' +
                            '<h4>' + data.nm_bln + '</h4> <span class="badge badge-success">Status : Terjadwal</span>' +
                            '</div>' +
                            '<div class="col-4 text-center">' +
                            'Hasil Capaian Kinerja ' + data.nm_bln + '<h3>' + nilaipkp + '</h3>' +
                            '</div>' +
                            '<div class="col-3 text-center">' +
                            'Mutu' + mutu +
                            '</div>' +
                            '<div class="col-2 text-center">' +
                            '<div class="button-group">' +
                            '<a href="' + BASE_URL + 'pkp/cetak_pkp/' + data.id_pkp + '" target="_blank" class="btn waves-effect waves-light btn-warning" title="Cetak"><i class="mdi mdi-printer"></i> Cetak</a>&nbsp;' +

                            '</div>' + '</div>' +
                            '</div>'
                    }
                } else if (data.stts_pkp == 0) {
                    if (data.kunci_bln == 0) {
                        return '<div class="row">' +
                            '<div class="col-3 text-left">' +
                            '<h4>' + data.nm_bln + '</h4> <span class="badge badge-warning">Status : Terkunci</span>' +
                            '</div>' +
                            '<div class="col-4 text-center">' +
                            'Hasil Capaian Kinerja ' + data.nm_bln + '<h3>' + nilaipkp + '</h3>' +
                            '</div>' +
                            '<div class="col-3 text-center">' +
                            'Mutu' + mutu +
                            '</div>' +
                            '<div class="col-2 text-center">' +
                            '<div class="button-group">' +
                            '<button type="button" class="btn waves-effect waves-light btn-info" onclick="TambahIndikator(this)" data-kc="' + data.kunci_bln + '" data-idPkp="' + data.id_pkp + '" data-idUser="' + data.id_user + '" data-NmBln="' + data.nm_bln + '">+ Indikator</button>' +

                            '</div>' + '</div>' +
                            '</div>'

                    } else if (data.kunci_bln == 1) {
                        return '<div class="row">' +
                            '<div class="col-3 text-left">' +
                            '<h4>' + data.nm_bln + '</h4> <span class="badge badge-success">Status : Terjadwal</span>' +
                            '</div>' +
                            '<div class="col-4 text-center">' +
                            'Hasil Capaian Kinerja ' + data.nm_bln + '<h3>' + nilaipkp + '</h3>' +
                            '</div>' +
                            '<div class="col-3 text-center">' +
                            'Mutu' + mutu +
                            '</div>' +
                            '<div class="col-2 text-center">' +
                            '<div class="button-group">' +
                            '<button type="button" class="btn waves-effect waves-light btn-info " onclick="TambahIndikator(this)" data-kc="' + data.kunci_bln + '" data-idPkp="' + data.id_pkp + '" data-idUser="' + data.id_user + '" data-NmBln="' + data.nm_bln + '">+ Indikator</button>' +

                            '</div>' + '</div>' +
                            '</div>'
                    }
                }

            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.indikator == null) {
                    return 'Belum Ada Indikator'
                } else {
                    if (data.stts_indikator == 0) {
                        return '<div class="text-left"><b><a class="text-info" href="' + BASE_URL + 'pkp/keg/' + data.id_bln + '/' + data.id_pkp + '/' + data.id_indikator + '"> ' + data.indikator + '</a> </b><br></div>' +
                            '<button type="button" onClick="LihatKeg(this)" data-idindikator="' + data.id_indikator + '" data-indikator="' + data.indikator + '" data-nmbln="' + data.nm_bln + '" data-nilaiind="' + data.nilai_indikator + '" class="btn waves-effect waves-light btn-sm btn-info">' + data.jmlh_keg + ' KEGIATAN TUGAS JABATAN </button></div>'

                    } else {
                        return '<div class="text-left text-info"><b>' + data.indikator + '&nbsp;<span class="badge badge-success">Sudah Verifikasi</span></b></div>' +
                            '<button type="button" onClick="LihatKeg(this)" data-idindikator="' + data.id_indikator + '" data-indikator="' + data.indikator + '" data-nmbln="' + data.nm_bln + '" data-nilaiind="' + data.nilai_indikator + '" class="btn waves-effect waves-light btn-sm btn-info">' + data.jmlh_keg + ' KEGIATAN TUGAS JABATAN </button></div>'

                    }

                }

            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.nilai_indikator == null) {
                    return ''
                } else {
                    return '<div class="text-center"><h4>' + data.nilai_indikator + '</h4> </div>'

                }

            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.indikator == null) {
                    return ''
                } else {
                    if (data.stts_indikator == 0) {
                        return '<div class="text-center">' +
                            '<button type="button" onClick="EditIndikator(this)" data-kc="' + data.kunci_bln + '" data-idindikator="' + data.id_indikator + '" data-indikator="' + data.indikator + '" data-nmbln="' + data.nm_bln + '" class="btn waves-effect waves-light btn-sm btn-info" title="Edit Indikator"><i class="mdi mdi-pencil"></i></button>&nbsp;' +
                            '<a href="' + BASE_URL + 'pkp/keg/' + data.id_bln + '/' + data.id_pkp + '/' + data.id_indikator + '" class="btn waves-effect waves-light btn-sm btn-success" title="Tambah Kegiatan"><i class="mdi mdi-plus"></i></a>&nbsp;' +
                            '<button type="button" onClick="LihatKeg(this)" data-idindikator="' + data.id_indikator + '" data-indikator="' + data.indikator + '" data-nmbln="' + data.nm_bln + '" data-nilaiind="' + data.nilai_indikator + '" class="btn waves-effect waves-light btn-sm btn-warning"><i class="mdi mdi-eye"></i></button>&nbsp;' +

                            '<button type="button" onClick="DelInd(this)"  data-kc="' + data.kunci_bln + '" data-idpkp="' + data.id_pkp + '" data-id_indikator="' + data.id_indikator + '" class="btn waves-effect waves-light btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>' +
                            '</div>'
                    } else if (data.stts_indikator == 1) {
                        return '<div class="text-center">' +
                            '<i class="mdi mdi-lock-outline"></i>' +

                            '</div>'
                    }


                }


            }
        },
        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            //$('td:eq(0)', row).html(index);
        },
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(1, { page: 'current' }).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr class="group bg-dark text-white"><td colspan="7"> ' + group + '</td></tr>'
                    );

                    last = group;
                }
            });
        }
    });
}

function TambahIndikator(elem) {
    var idPkp = $(elem).data("idpkp");
    var nmbln = $(elem).data("nmbln");
    var iduser = $(elem).data("iduser");
    var kc = $(elem).data("kc");
    if (kc == 0) {
        swal({
            type: 'warning',
            title: 'Terkunci',
            timer: 2000,
        })
    } else if (kc == 1) {
        $('#ModalTambahIndikator').modal('show');
        document.getElementById("NmBln").innerHTML = nmbln;
        $('#id_user').val(iduser);
        $('#id_pkp').val(idPkp);
    }



}

function EditIndikator(elem) {
    var kc = $(elem).data("kc");
    if (kc == 0) {
        swal({
            type: 'warning',
            title: 'Terkunci',
            timer: 2000,
        })
    } else if (kc == 1) {
        var id = $(elem).data("idindikator");
        var nmbln = $(elem).data("nmbln");
        var indikator = $(elem).data("indikator");


        $('#ModalEditIndikator').modal('show');
        document.getElementById("NmBlnEditInd").innerHTML = nmbln;
        $('#id_indikator').val(id);
        $('#indikator_edit').val(indikator);
    }


}


$('#FormTambahIndikator').on('submit', function (e) {
    var postData = new FormData($("#FormTambahIndikator")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "pkp/tambah_indikator",
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
            $('#TabelPkp').DataTable().ajax.reload(null, false);
            $('#ModalTambahIndikator').modal('hide');

        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelPkp').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});


$('#FormEditIndikator').on('submit', function (e) {
    var postData = new FormData($("#FormEditIndikator")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "pkp/edit_indikator",
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
            $('#TabelPkp').DataTable().ajax.reload(null, false);
            $('#ModalEditIndikator').modal('hide');

        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelPkp').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

function TambahKeg(elem) {
    var id_indikator = $(elem).data("id_indikator");
    var indikator = $(elem).data("indikator");
    $('#ModalTambahKeg').modal('show');
    $('#id_indikator').val(id_indikator);
    $('#indikator').val(indikator);


}

function EditKeg(elem) {
    var id = $(elem).data("id");
    var id_ind = $(elem).data("id_ind");

    $.ajax({
        type: "POST",
        "url": BASE_URL + 'pkp/json_get_keg/' + id + '/' + id_ind,
        dataType: "JSON",
        success: function (data) {

            $('#ModalEditKeg').modal('show');
            $('#id_keg').val(data['id_keg'])
            $('#indikator_keg').val(data['indikator'])
            $('#keg_edit').val(data['keg'])
            $('#ak_target_edit').val(data['ak_target'])
            $('#output_target_edit').val(data['output_target'])
            $('#satuan_target_edit').val(data['satuan_target'])
            $('#mutu_target_edit').val(data['mutu_target'])

            $('#ak_real_edit').val(data['ak_real'])
            $('#output_real_edit').val(data['output_real'])
            $('#satuan_real_edit').val(data['satuan_real'])
            $('#mutu_real_edit').val(data['mutu_real'])
            $('#mutu_kuant_kual_edit').val(data['mutu_kuant_kual'])
            $('#nilai_kin_edit').val(data['nilai_kin_keg'])



        }
    });




}

function LihatKeg(elem) {
    var idindikator = $(elem).data("idindikator");
    var indikator = $(elem).data("indikator");
    var nmbln = $(elem).data("nmbln");
    var nilaiind = $(elem).data("nilaiind");

    $('#ModalViewKeg').modal('show');
    document.getElementById('NmIndikator').innerHTML = indikator
    document.getElementById('NmBlnView').innerHTML = nmbln
    document.getElementById('NilaiIndView').innerHTML = nilaiind

    TableKegView(idindikator)



}

function TableKegView(idindikator) {
    var table = $('#TabelKegView').DataTable({
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
            "url": BASE_URL + "pkp/json_keg/" + idindikator,
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [
            //1
            {
                "data": "urut_keg",
                "orderable": true,
            },
            //2
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.keg + '</div>'

                }
            },
            //3
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.ak_target + '</div>'

                }
            },
            //4
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.output_target + '</div>'

                }
            },
            //5
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.satuan_target + '</div>'

                }
            },
            //6
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.mutu_target + '</div>'

                }
            },
            //7
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.ak_real + '</div>'

                }
            },
            //8
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.output_real + '</div>'

                }
            },
            //9
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.satuan_real + '</div>'

                }
            },
            //10
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.mutu_real + '</div>'

                }
            },
            //11
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.nilai_kin_keg + '</div>'

                }
            },
            //11
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.stts_keg == 0) {
                        return '<div class="text-center"><span class="badge badge-warning">Pending</span></div>'

                    } else {
                        return '<div class="text-center"><span class="badge badge-success">Verifikasi</span></div>'

                    }

                }
            },


        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        },

    });
}

$('.input-keg').keyup(function () {
    var output_real = $('#output_real').val();
    var output_target = $('#output_target').val();

    var mutu_kuant_kual = output_real / output_target * 100

    $('#mutu_kuant_kual').val(mutu_kuant_kual)
})

$('.input-keg-edit').keyup(function () {
    var output_real = $('#output_real_edit').val();
    var output_target = $('#output_target_edit').val();

    var mutu_kuant_kual = output_real / output_target * 100

    $('#mutu_kuant_kual_edit').val(mutu_kuant_kual)
})

$('.nilai').keyup(function () {


    var sum = 0;
    $("input[class *= 'mutu']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });

    var nilai_kin = sum / 2

    $('#nilai_kin').val(nilai_kin)
    document.getElementById('NilaiKin').innerHTML = nilai_kin.toFixed(2);

})
$('.nilaiedit').keyup(function () {


    var sum = 0;
    $("input[class *= 'mutuedit']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });

    var nilai_kin = sum / 2

    $('#nilai_kin_edit').val(nilai_kin)
    document.getElementById('NilaiKinEdit').innerHTML = nilai_kin.toFixed(2);

})

$('#FormTambahKeg').on('submit', function (e) {
    var postData = new FormData($("#FormTambahKeg")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "pkp/tambah_keg",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {

            if (data.error) {
                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Gagal Simpan Data',
                    timer: 2000,
                })
            }
            if (data.success) {
                swal({
                    type: 'success',
                    title: 'Simpan',
                    text: 'Berhasil Simpan Data',
                    timer: 2000,
                })
                $('#TabelKeg').DataTable().ajax.reload(null, false);
                $('#ModalTambahKeg').modal('hide');
                PostNilaiInd()
                NilaiIndikator()
                PostNilaiPkp()


            }


        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelKeg').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

$('#FormEditKeg').on('submit', function (e) {
    var postData = new FormData($("#FormEditKeg")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "pkp/edit_keg",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {

            if (data.error) {
                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Gagal Simpan Data',
                    timer: 2000,
                })
            }
            if (data.success) {
                swal({
                    type: 'success',
                    title: 'Simpan',
                    text: 'Berhasil Simpan Data',
                    timer: 2000,
                })
                $('#TabelKeg').DataTable().ajax.reload(null, false);
                $('#ModalEditKeg').modal('hide');
                PostNilaiInd()
                NilaiIndikator()
                PostNilaiPkp()


            }


        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelKeg').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

function DelInd(elem) {
    var id_indikator = $(elem).data("id_indikator");
    var kc = $(elem).data("kc");
    if (kc == 0) {
        swal({
            type: 'warning',
            title: 'Terkunci',
            timer: 2000,
        })
    } else if (kc == 1) {
        swal({
            title: 'Hapus',
            text: 'Anda Yakin Hapus ?',
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
                url: BASE_URL + 'pkp/del_ind/',
                type: "POST",
                data: {

                    id_indikator: id_indikator,

                },
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Data dihapus',
                        timer: 2000,
                    })

                    $('#TabelPkp').DataTable().ajax.reload(null, false);

                },
                error: function () {
                    swal({
                        type: 'warning',
                        title: 'Gagal',
                        text: 'HAPUS DATA KEGIATAN TUGAS JABATAN TERLEBIH DULU',
                        timer: 2000,
                    })

                }
            });
        });
    }


}

function DelKeg(elem) {
    var id = $(elem).data("id");


    swal({
        title: 'Hapus',
        text: 'Anda Yakin Hapus ?',
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
            url: BASE_URL + 'pkp/del_keg/',
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
                $('#TabelKeg').DataTable().ajax.reload(null, false);
                NilaiIndikator()
                PostNilaiInd()
                PostNilaiPkp()
            },
            error: function (xhr, ajaxOptions, thrownError) {


            }
        });
    });
}



function NilaiIndikator() {
    $.ajax({
        type: "POST",
        "url": BASE_URL + 'pkp/get_sum_nilai_ind/' + IdIndikator,
        dataType: "JSON",
        success: function (data) {
            var nilai_sum = data['nilai_sum']
            var nilai_count = data['nilai_count']
            var NilaiInd = nilai_sum / nilai_count
            if (isNaN(NilaiInd)) {
                var NilaiInd = 0;
            }
            document.getElementById('NilaiInd').innerHTML = NilaiInd;


        }
    });
}

function PostNilaiInd() {
    $.ajax({
        type: "POST",
        "url": BASE_URL + 'pkp/get_sum_nilai_ind/' + IdIndikator,
        dataType: "JSON",
        success: function (data) {
            var nilai_sum = data['nilai_sum']
            var nilai_count = data['nilai_count']
            var NilaiInd = nilai_sum.toFixed(2) / nilai_count.toFixed(2)
            if (isNaN(NilaiInd)) {
                var NilaiInd = 0;
            }
            $.ajax({
                url: BASE_URL + 'pkp/update_nilai_ind/' + IdIndikator,
                type: "POST",
                data: {


                    NilaiInd: NilaiInd
                },
                success: function () {

                    $.ajax({
                        type: "POST",
                        "url": BASE_URL + 'pkp/get_sum_nilai_pkp/' + IdPkp,
                        dataType: "JSON",
                        success: function (data) {
                            var NilaiPkp = data['nilai']

                            if (isNaN(NilaiPkp)) {
                                var NilaiPkp = 0;
                            }
                            $.ajax({
                                url: BASE_URL + 'pkp/update_nilai_pkp/' + IdPkp + '/' + IdBln,
                                type: "POST",
                                data: {


                                    NilaiPkp: NilaiPkp,
                                },
                                success: function () {


                                },
                                error: function (xhr, ajaxOptions, thrownError) {


                                }
                            });

                        }
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {


                }
            });

        }
    });

}