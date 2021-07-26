$(document).ready(function () {

    Sinkron()
    grafik()
    $.ajax({
        url: BASE_URL + "dashboard/jadwal_exp",
        method: "GET",

        async: false,
        dataType: 'json',
        success: function (data) {
            if (data.jan == null) {
                document.getElementById("jan").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#jan').countdown(data.jan)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }

            if (data.feb == null) {
                document.getElementById("feb").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#feb').countdown(data.feb)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }
            if (data.mar == null) {
                document.getElementById("mar").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#mar').countdown(data.mar)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }

            if (data.apr == null) {
                document.getElementById("apr").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#apr').countdown(data.apr)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }
            if (data.mei == null) {
                document.getElementById("mei").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#mei').countdown(data.mar)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }
            if (data.jun == null) {
                document.getElementById("jun").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#jun').countdown(data.jun)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }
            if (data.jul == null) {
                document.getElementById("jul").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#jul').countdown(data.jul)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }
            if (data.ags == null) {
                document.getElementById("ags").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#ags').countdown(data.ags)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }

            if (data.sep == null) {
                document.getElementById("sep").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#sep').countdown(data.sep)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }
            if (data.jul == null) {
                document.getElementById("okt").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#okt').countdown(data.okt)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }
            if (data.nov == null) {
                document.getElementById("nov").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#nov').countdown(data.nov)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }

            if (data.des == null) {
                document.getElementById("des").innerHTML = "<span class='text-warning'>Jadwal Terkunci</span";

            } else {
                $('#des').countdown(data.des)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format = '%-d Hari ' + format;
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('Expired')
                            .parent().addClass('disabled');

                    });
            }


        }
    });
})




function grafik() {
    $.ajax({
        type: "post",
        "url": BASE_URL + 'dashboard/grafik_pkp',
        dataType: "JSON",
        success: function (data) {
            new Chart(document.getElementById("chart1"), {
                "type": "line",
                "data": {
                    "labels": ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                    "datasets": [{
                        "label": "Grafik Nilai Bulanan",
                        "data": [data.jan, data.feb, data.mar, data.apr, data.mei, data.jun, data.jul, data.ags, data.sep, data.okt, data.nov, data.des],
                        "fill": false,
                        "borderColor": "rgb(75, 192, 192)",
                        "lineTension": 0.1
                    }]
                },
                "options": {
                    scales: {
                        xAxes: [{
                            ticks: {}
                        }],
                        yAxes: [{
                            ticks: {

                                stepSize: 100,
                                // Return an empty string to draw the tick line but hide the tick label
                                // Return `null` or `undefined` to hide the tick line entirely

                            }
                        }]
                    },
                }
            });
        },

    })
}

function Sinkron() {
    $.ajax({
        url: BASE_URL + "dashboard/btn_sinkron",
        method: "GET",

        async: false,
        dataType: 'json',
        success: function (response) {


            if (response == 0) {
                document.getElementById('BtnSinkron').innerHTML = '<div class="alert alert-warning">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>' +
                    '<h3 class="text-warning"> Perhatian</h3> Anda belum melakukan Sinkron data, mohon untuk melakukan Sinkron Data terlebih dulu.</h3>' +
                    '<div class="col-12 text-center"><button type="button" onClick="BtnSinkron(this)" data-id="' + id_user + '" class="btn btn-info  "><i class="mdi mdi-refresh"></i> Sinkron Data</button></div>' +
                    '</div>';



            } else if (response == 1) {
                document.getElementById('BtnSinkron').innerHTML = '';

            }

        }
    });
}


function BtnSinkron(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");
    swal({
        title: 'Sinkronkan Data.?',
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
            url: BASE_URL + 'dashboard/sinkron',
            type: "POST",
            data: {

                id: id,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil Sinkron',
                    text: '',
                    timer: 2000,
                })
                Sinkron();
                grafik();
                $('#TabelSttsPkp').DataTable().ajax.reload(null, false);
                $('#TabelSkorPkp').DataTable().ajax.reload(null, false);
                $('#TabelNilaiDsPkp').DataTable().ajax.reload(null, false);

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