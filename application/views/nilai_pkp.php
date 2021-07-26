<div class="card">

    <div class="card-body">
        <div class="card-title">
            <h2>DAFTAR PEGAWAI YANG AKAN DINILAI</h2>
        </div>


        <div class="table-responsive">
            <table id="TabelNilaiPegawai" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="1%" class="text-center">NO</th>
                        <th width="10%" class="text-center">NAMA PEGAWAI</th>
                        <th width="5%" class="text-center">JANUARI</th>
                        <th width="5%" class="text-center">FEBRUARI</th>
                        <th width="5%" class="text-center">MARET</th>
                        <th width="5%" class="text-center">APRIL</th>
                        <th width="5%" class="text-center">MEI</th>
                        <th width="5%" class="text-center">JUNI</th>
                        <th width="5%" class="text-center">JULI</th>
                        <th width="5%" class="text-center">AGUSTUS</th>
                        <th width="5%" class="text-center">SEPTEMBER</th>
                        <th width="5%" class="text-center">OKTOBER</th>
                        <th width="5%" class="text-center">NOVEMBER</th>
                        <th width="5%" class="text-center">DESEMBER</th>
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

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="ModalTambahIndikator" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambahkan Indikator <span id="NmBln"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal" id="FormTambahIndikator">

                    <input type="text" hidden name="id_user" id="id_user" class="form-control" placeholder="Skor">
                    <input type="text" hidden name="id_pkp" id="id_pkp" class="form-control">

                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="indikator" id="indikator" placeholder="Tambahkan Indikator Kinerja"></textarea>
                    </div>

                    <div class="form-group text-center m-b-0">
                        <button class="btn btn-info waves-effect waves-light" type="submit">
                            Simpan
                        </button>
                        <button class="btn btn-warning waves-effect m-l-5" data-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="ModalEditIndikator" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Indikator <span id="NmBlnEditInd"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal" id="FormEditIndikator">

                    <input type="text" hidden name="id_indikator" id="id_indikator" class="form-control">

                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="indikator_edit" id="indikator_edit" placeholder="Tambahkan Indikator Kinerja"></textarea>
                    </div>

                    <div class="form-group text-center m-b-0">
                        <button class="btn btn-info waves-effect waves-light" type="submit">
                            Simpan
                        </button>
                        <button class="btn btn-warning waves-effect m-l-5" data-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal bs-example-modal-lg" id="ModalViewKeg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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
                            <h6 id="NmBlnView"></h6>
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
                            <h6 id="NmIndikator"></h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6>NILAI CAPAIAN KINERJA INDIKATOR</h6>
                        </td>
                        <td>
                            <h6 id="NilaiIndView"></h6>
                        </td>
                    </tr>

                </table>
                <div class="table-responsive">
                    <table id="TabelKegView" class="table table-bordered table-wrap table-info" width="100%">
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