$(document).ready(function () {

    var table = $('#TabelNilaiPegawaiAdmin').DataTable({
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
                return '<div class="text-left"><a href="#" class="text-info">' + data.nama + '</a></div>'
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {

                if (data.jan == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.jan + '<br>' + mutu(data.jan) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.feb == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.feb + '<br>' + mutu(data.feb) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.mar == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.mar + '<br>' + mutu(data.mar) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.apr == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.apr + '<br>' + mutu(data.apr) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.mei == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.mei + '<br>' + mutu(data.mei) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.jun == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.jun + '<br>' + mutu(data.jun) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.jul == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.jul + '<br>' + mutu(data.jul) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.ags == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.ags + '<br>' + mutu(data.ags) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.sep == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.sep + '<br>' + mutu(data.sep) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.okt == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.okt + '<br>' + mutu(data.okt) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.nov == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.nov + '<br>' + mutu(data.nov) + '</div>'

                }
            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.des == null) {
                    return '<div class="text-center">-</div>'

                } else {
                    return '<div class="text-center">' + data.des + '<br>' + mutu(data.des) + '</div>'

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

