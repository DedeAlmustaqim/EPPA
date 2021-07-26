<div class="card">
    <div class="card-body">
        <div class="col-12">
            <div class="button-group m-b-10 m-l-0">
                <a href="<?php echo base_url() ?>pkp" class="btn waves-effect waves-light btn-info">
                    Kembali</a>
            </div>


            <table class="table table-striped">
                <tr>
                    <td width="30%">
                        <h4>BULAN</h4>
                    </td>
                    <td>
                        <h4><?php echo $bln ?></h4>
                    </td>
                </tr>
                <tr>
                    <td width="30%">
                        <h4>TAHUN</h4>
                    </td>
                    <td>
                        <h4><?php echo $this->session->userdata('ta') ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>INDIKATOR KINERJA</h4>
                    </td>
                    <td>
                        <h4><?php echo $indikator ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>NILAI CAPAIAN KINERJA INDIKATOR</h4>
                    </td>
                    <td>
                        <h4 id="NilaiInd"></h4>
                    </td>
                </tr>
                <?php if ($kunci_bln == 1) { ?>
                    <tr>
                        <td>
                            <div class="button-group m-b-10 m-l-0">
                                <button type="button" class="btn waves-effect waves-light btn-info" onClick="TambahKeg(this)" data-id_indikator="<?php echo $this->uri->segment(5) ?>" data-indikator="<?php echo $indikator ?>">+ Keg Tugas Jabatan</button>
                            </div>
                        </td>
                        <td>

                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
        <div class="table-responsive">
            <table id="TabelKeg" class="table table-bordered table-wrap table-info" width="100%">
                <thead>
                    <tr class="text-center">
                        <th rowspan="2">NO</th>
                        <th width="40%" rowspan="2">KEGIATAN TUGAS JABATAN </th>
                        <th rowspan="2">AK</th>
                        <th colspan="3">TARGET</th>
                        <th rowspan="2">AK</th>
                        <th colspan="3">REALISASI</th>
                        <th rowspan="2">NILAI CAPAIAN KINERJA</th>
                        <th rowspan="2" width="15%">AKSI</th>
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
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>



<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="ModalTambahKeg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambahkan Kegiatan Tugas Jabatan </span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal" id="FormTambahKeg">

                    <input type="text" hidden name="id_indikator" id="id_indikator" class="form-control">
                    <input type="text"  name="id_bln" id="id_bln" value="<?php echo $this->uri->segment(3) ?>"  class="form-control">
                    <input type="text"  name="id_pkp_keg" id="id_pkp_keg" value="<?php echo $this->uri->segment(4) ?>" class="form-control">


                    <div class="form-group row">
                        <label for="example-search-input" class="col-3 col-form-label">INDIKATOR KINERJA</label>
                        <div class="col-9">
                            <textarea class="form-control" readonly rows="3" name="indikator" id="indikator"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-3 col-form-label">KEGIATAN TUGAS JABATAN</label>
                        <div class="col-9">
                            <textarea class="form-control" rows="3" name="keg" id="keg"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-b-10">
                        <div class="col-12">
                            <h3 class="text-center"><b>Target</b></h3>
                        </div>


                        <div class="col-3">
                            <input type="text" class="form-control input-keg nilai decimal" name="ak_target" id="ak_target" placeholder="AK">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg nilai decimal" name="output_target" id="output_target" placeholder="KUANT/ OUTPUT">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg nilai" name="satuan_target" id="satuan_target" placeholder="SATUAN">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg nilai decimal" name="mutu_target" id="mutu_target" placeholder="KUAL/ MUTU">
                        </div>
                    </div>
                    <hr>
                    <h3 class="text-center"><b>Realisasi</b></h3>
                    <div class="row m-b-10">
                        <div class="col-3">
                            <input type="text" class="form-control input-keg nilai decimal" name="ak_real" id="ak_real" placeholder="AK">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg nilai decimal" name="output_real" id="output_real" placeholder="KUANT/ OUTPUT">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg nilai" name="satuan_real" id="satuan_real" placeholder="SATUAN">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg nilai mutu decimal" name="mutu_real" id="mutu_real" placeholder="KUAL/ MUTU">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-5 col-form-label">
                            <b>
                                <h3>NILAI CAPAIAN KINERJA</h3>
                            </b>
                        </label>
                        <div class="col-4">
                            <input type="text" hidden class="form-control mutu" name="mutu_kuant_kual" id="mutu_kuant_kual">
                            <input type="text" hidden class="form-control" name="nilai_kin" id="nilai_kin"><b>
                                <h2 class="text-success" id="NilaiKin"></h2>
                            </b>
                        </div>
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
<div class="modal fade bs-example-modal-lg" id="ModalEditKeg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Kegiatan Tugas Jabatan </span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal" id="FormEditKeg">

                    <input type="text" hidden name="id_keg" id="id_keg" class="form-control">
                    <input type="text"  name="id_pkp_keg_edit" id="id_pkp_keg_edit" value="<?php echo $this->uri->segment(4) ?>" class="form-control">


                    <div class="form-group row">
                        <label for="example-search-input" class="col-3 col-form-label">INDIKATOR KINERJA</label>
                        <div class="col-9">
                            <textarea class="form-control" readonly rows="3" name="indikator_keg" id="indikator_keg"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-3 col-form-label">KEGIATAN TUGAS JABATAN</label>
                        <div class="col-9">
                            <textarea class="form-control" rows="3" name="keg_edit" id="keg_edit"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-b-10">
                        <div class="col-12">
                            <h3 class="text-center"><b>Target</b></h3>
                        </div>


                        <div class="col-3">
                            <input type="text" class="form-control input-keg-edit nilaiedit decimal" name="ak_target_edit" id="ak_target_edit" placeholder="AK">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg-edit nilaiedit decimal" name="output_target_edit" id="output_target_edit" placeholder="KUANT/ OUTPUT">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg-edit nilaiedit" name="satuan_target_edit" id="satuan_target_edit" placeholder="SATUAN">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg-edit nilaiedit decimal" name="mutu_target_edit" id="mutu_target_edit" placeholder="KUAL/ MUTU">
                        </div>
                    </div>
                    <hr>
                    <h3 class="text-center"><b>Realisasi</b></h3>
                    <div class="row m-b-10">
                        <div class="col-3">
                            <input type="text" class="form-control input-keg-edit nilaiedit decimal" name="ak_real_edit" id="ak_real_edit" placeholder="AK">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg-edit nilaiedit decimal" name="output_real_edit" id="output_real_edit" placeholder="KUANT/ OUTPUT">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg-edit nilaiedit" name="satuan_real_edit" id="satuan_real_edit" placeholder="SATUAN">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control input-keg-edit nilaiedit mutuedit decimal" name="mutu_real_edit" id="mutu_real_edit" placeholder="KUAL/ MUTU">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-5 col-form-label">
                            <b>
                                <h3>NILAI CAPAIAN KINERJA</h3>
                            </b>
                        </label>
                        <div class="col-4">
                            <input type="text" hidden class="form-control mutuedit" name="mutu_kuant_kual_edit" id="mutu_kuant_kual_edit">
                            <input type="text" hidden class="form-control" name="nilai_kin_edit" id="nilai_kin_edit"><b>
                                <h2 class="text-success" id="NilaiKinEdit"></h2>
                            </b>
                        </div>
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
<script>
    var IdBln = "<?php echo $this->uri->segment(3) ?>"
    var IdPkp = "<?php echo $this->uri->segment(4) ?>"
    var IdIndikator = "<?php echo $this->uri->segment(5) ?>"
</script>