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

    var table = $('#TabelNilaiPegawai').DataTable({
        destroy: true,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        "bAutoWidth": true,
        "columnDefs": [{
            "visible": false,
            "targets": [],

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
            "url": BASE_URL + "/nilai_pkp/json_pkp_peg/",
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [{
            "data": "urut_user",
            "className": "text-center",
            "orderable": true,
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                return '<div class="text-left"><a href="' + BASE_URL + 'nilai_pkp/get_peg/' + data.id_user + '" class="text-info">' + data.nama + '</a></div>'
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.jan == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.jan + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.feb == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.feb + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.mar == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.mar + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.apr == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.apr + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.mei == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.mei + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.jun == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.jun + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.jul == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.jul + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.ags == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.ags + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.sep == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.sep + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.okt == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.okt + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.nov == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.nov + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.des == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.des + '</div>'

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

});

$('#blnpeg').ready(function () {
    var bln_peg = $(this).val();

    TabelPkpPeg(bln_peg)
    $('#TabelPkpPeg').DataTable().ajax.reload(null, false);


});

$('#blnpeg').change(function () {
    var bln_peg = $(this).val();

    TabelPkpPeg(bln_peg)
    $('#TabelPkpPeg').DataTable().ajax.reload(null, false);
});

function TabelPkpPeg(bln_peg) {
    if (bln_peg == 0) {
        var bln = 0
    } else {
        var bln = bln_peg
    }
    var table = $('#TabelPkpPeg').DataTable({
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
            "url": BASE_URL + "/nilai_pkp/json_pkp_tabel_peg/" + bln + '/' + id_user,
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
                if (data.stts_pkp == 0) {
                    var stts_pkp_x = '<span class="badge badge-warning">Belum Verifikasi</span>'
                } else {
                    var stts_pkp_x = '<span class="badge badge-success">Verifikasi</span>'

                }
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
                        stts_pkp_x +
                        '</div>' +
                        '</div>'

                } else {
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
                        stts_pkp_x +
                        '</div>' +
                        '</div>'
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
                        return '<div class="text-left"><b>' + data.indikator + ' </b><br></div>' +
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
                            '<button type="button" onClick="VerifKeg(this)" data-idindikator="' + data.id_indikator + '" data-indikator="' + data.indikator + '" data-nmbln="' + data.nm_bln + '" data-nilaiind="' + data.nilai_indikator + '" class="btn waves-effect waves-light btn-sm btn-warning" "Lihat Kegiatan"><i class="mdi mdi-eye"></i></button>&nbsp;' +

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

function VerifKeg(elem) {
    var idindikator = $(elem).data("idindikator");
    var indikator = $(elem).data("indikator");
    var nmbln = $(elem).data("nmbln");
    var nilaiind = $(elem).data("nilaiind");

    $('#ModalVerifKeg').modal('show');
    document.getElementById('NmIndikatorV').innerHTML = indikator
    document.getElementById('NmBlnViewV').innerHTML = nmbln
    document.getElementById('NilaiIndViewV').innerHTML = nilaiind

    TableKegVerif(idindikator)



}

function TableKegVerif(idindikator) {
    var table = $('#TabelKegVerif').DataTable({
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
                        return '<div class="btn-group">' +
                            '<button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'Pending' +
                            '</button>' +
                            '<div class="dropdown-menu btn-sm">' +
                            '<a class="dropdown-item bg-success btn-sm" onClick="VerifKegAksi(this)" href="javascript:void(0)" data-bln="' + data.id_bln + '" data-kncverif="' + data.kunci_verif + '" data-pkp="' + data.id_pkp + '" data-id="' + data.id_keg + '" data-keg="' + data.keg + '" >Verifikasi</a>' +
                            '</div>' +
                            '</div>'
                    } else {
                        return '<div class="btn-group">' +
                            '<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'Verifikasi' +
                            '</button>' +
                            '<div class="dropdown-menu btn-sm">' +
                            '<a class="dropdown-item bg-warning btn-sm" onClick="UnVerifKeg(this)" href="javascript:void(0)" data-bln="' + data.id_bln + '" data-kncverif="' + data.kunci_verif + '" data-pkp="' + data.id_pkp + '" data-id="' + data.id_keg + '" data-keg="' + data.keg + '" >Pending</a>' +
                            '</div>' +
                            '</div>'
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

function VerifKegAksi(elem) {
    var id = $(elem).data("id");
    var keg = $(elem).data("keg");
    var pkp = $(elem).data("pkp");
    var kc = $(elem).data("kncverif");
    if (kc == 0) {
        swal({
            type: 'warning',
            title: 'Verifikasi Terkunci',
            timer: 2000,
        })
    } else if (kc == 1) {
        swal({
            title: 'Anda Yakin Verifikasi ?',
            text: keg,
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
                url: BASE_URL + 'nilai_pkp/verif_keg/',
                type: "POST",
                data: {
    
                    id: id,
    
                },
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Kegiatan diverifikasi',
                        timer: 2000,
                    })
                    PostSttsPkp(pkp)
    
                    $('#TabelKegVerif').DataTable().ajax.reload();
    
              
    
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

function UnVerifKeg(elem) {
    var id = $(elem).data("id");
    var keg = $(elem).data("keg");
    var pkp = $(elem).data("pkp");
    var kc = $(elem).data("kncverif");
    if (kc == 0) {
        swal({
            type: 'warning',
            title: 'Verifikasi Terkunci',
            timer: 2000,
        })
    } else if (kc == 1) {
        swal({
            title: 'Anda Yakin Batalkan Verifikasi ?',
            text: keg,
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
                url: BASE_URL + 'nilai_pkp/unverif_keg/',
                type: "POST",
                data: {
    
                    id: id,
    
                },
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Kegiatan dibatalkan Verifikasi',
                        timer: 2000,
                    })
                    PostSttsPkp(pkp)
    
                    $('#TabelKegVerif').DataTable().ajax.reload(null, false);
                   
    
    
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

function PostSttsPkp(pkp) {
    $.ajax({
        type: "POST",
        "url": BASE_URL + 'pkp/get_verif_pkp/' + pkp,
        dataType: "JSON",
        success: function (data) {
            var verif = data['verif']

            $.ajax({
                url: BASE_URL + 'pkp/update_stts_pkp/' + pkp,
                type: "POST",
                data: {


                    verif: verif
                },
                success: function () {
                    $('#TabelPkpPeg').DataTable().ajax.reload(null, false);

                },
                error: function (xhr, ajaxOptions, thrownError) {


                }
            });

        }
    });

}