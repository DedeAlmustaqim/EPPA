<div class="card border-info">
    <div class="card-header bg-info">
        <h4 class="m-b-0 text-white"><?php echo $judul ?></h4>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table id="TabelBulan" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">NO</th>
                        <th width="25%" class="text-center">BULAN</th>
                        <th width="25%" class="text-center">JADWAL INPUT DATA</th>
                        <th width="25%" class="text-center">JADWAL VERIFIKASI DATA</th>
                        <th width="5%" class="text-center">SETTING</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalJadwalInput" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h2>Jadwal Input Data</h2>&nbsp;<h2 id="NmBln"></h2>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="m-t-0" novalidate="" id="FormJadwal" method="post">
                    <div class="row pt-3">
                        <input type="text" id="IdBln" name="IdBln" class="form-control">

                        <div class="col-md-6">
                            <h2>Batas Awal</h2>
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <input type="date" name="TglAwal" id="TglAwal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Pukul</label>
                                <input class="form-control" type="time" id="WktInputAwal" name="WktInputAwal">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h2>Batas Akhir</h2>
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <input type="date" name="TglAkhir" id="TglAkhir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Pukul</label>
                                <input class="form-control" type="time" id="WktInputAkhir" name="WktInputAkhir">
                            </div>

                        </div>
                        <!--/span-->
                    </div>

            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn waves-effect waves-light btn-success">Simpan</button>
                <button type="reset" class="btn waves-effect waves-light btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal bs-example-modal-lg" id="ModalJadwalVerif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h2>Jadwal Verifikasi Data</h2>&nbsp;<h2 id="NmBln"></h2>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="m-t-0" novalidate="" id="FormJadwalVerif" method="post">
                    <div class="row pt-3">
                        <input type="text" id="IdBlnVerif" name="IdBlnVerif" class="form-control">

                        <div class="col-md-6">
                            <h2>Batas Awal</h2>
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <input type="date" name="TglAwalVerif" id="TglAwalVerif" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Pukul</label>
                                <input class="form-control" type="time" id="WktVerifAwal" name="WktVerifAwal">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h2>Batas Akhir</h2>
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <input type="date" name="TglAkhirVerif" id="TglAkhirVerif" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Pukul</label>
                                <input class="form-control" type="time" id="WktVerifAkhir" name="WktVerifAkhir">
                            </div>

                        </div>
                        <!--/span-->
                    </div>

            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn waves-effect waves-light btn-success">Simpan</button>
                <button type="reset" class="btn waves-effect waves-light btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>