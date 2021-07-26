<div class="row">
    <div class="col-6 border">
        <div class="card card-body">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4><b>PEGAWAI NEGERI YANG DINILAI</b></h4>
                    <table width="100%" border="0">

                        <tr>
                            <td class="text-left" width="30%">NAMA</td>
                            <td class="text-left">: <?php echo $nama ?></td>
                            <td rowspan="4" width="15%">
                                <img src="http://localhost/eppa/assets/images/users/1.jpg" alt="user" width="100px" class="">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">NIP</td>
                            <td class="text-left">: <?php echo $username ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">PANGKAT/GOL. RUANG</td>
                            <td class="text-left">: -</td>
                        </tr>
                        <tr>
                            <td class="text-left">JABATAN</td>
                            <td class="text-left">: <?php echo $nm_jbt ?></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card card-body">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4><b>INFORMASI</b></h4>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row m-l-15">

            <div class="col-3"><b>FILTER DATA</b>
                <select class="custom-select" id="blnpeg">
                    <option value="0">Semua Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table id="TabelPkpPeg" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="3%" class="text-center">NO</th>
                        <th width="10%" class="text-center">BULAN</th>
                        <th width="50%" class="text-center">INDIKATOR KINERJA</th>
                        <th width="5%" class="text-center">INDIKATOR CAPAIAN KINERJA</th>
                        <th width="10%" class="text-center"></th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4 text-left">

    </div>
    <div class="col-5 text-left">

    </div>
    <div class="col-3 text-left">

    </div>
</div>

<script>
var id_user = "<?php echo $this->uri->segment(3)?>"
</script>

<div class="modal bs-example-modal-lg" id="ModalVerifKeg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Lihat Kegiatan Tugas Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <td width="30%">
                            <h6>BULAN</h6>
                        </td>
                        <td>
                            <h6 id="NmBlnViewV"></h6>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">
                            <h6>TAHUN</h6>
                        </td>
                        <td>
                            <h6><?php echo $this->session->userdata('ta') ?></h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6>INDIKATOR KINERJA</h6>
                        </td>
                        <td>
                            <h6 id="NmIndikatorV"></h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6>NILAI CAPAIAN KINERJA INDIKATOR</h6>
                        </td>
                        <td>
                            <h6 id="NilaiIndViewV"></h6>
                        </td>
                    </tr>

                </table>
                <div class="table-responsive">
                    <table id="TabelKegVerif" class="table table-bordered table-wrap table-info" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th rowspan="2">NO</th>
                                <th width="40%" rowspan="2">KEGIATAN TUGAS JABATAN </th>
                                <th rowspan="2">AK</th>
                                <th colspan="3">TARGET</th>
                                <th rowspan="2">AK</th>
                                <th colspan="3">REALISASI</th>
                                <th rowspan="2">NILAI CAPAIAN KINERJA</th>
                                <th rowspan="2">STATUS</th>
                            </tr>
                            <tr class="text-center">
                                <th>KUANT/ OUTPUT</th>
                                <th>SATUAN</th>
                                <th>KUAL/ MUTU</th>
                                <th>KUANT/ OUTPUT</th>
                                <th>SATUAN</th>
                                <th>KUAL/ MUTU</th>
                            </tr>
                            <tr class="text-center">
                                <th>(1)</th>
                                <th>(2)</th>
                                <th>(3)</th>
                                <th>(4)</th>
                                <th>(5)</th>
                                <th>(6)</th>
                                <th>(7)</th>
                                <th>(8)</th>
                                <th>(9)</th>
                                <th>(10)</th>
                                <th>(11)</th>
                                <th>(12)</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->