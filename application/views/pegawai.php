<div class="card">
    <div class="card-body collapse show">
        <div class="row">
            <div class="col-3">
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#ModalTambahPegawai"><i class="mdi mdi-account-plus"></i> Pegawai</button>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="TabelPegawai" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">NO</th>
                            <th width="20%" class="text-center">NAMA</th>
                            <th width="15%" class="text-center">JABATAN</th>
                            <th width="10%" class="text-center">NIP</th>
                            <th width="10%" class="text-center">PANGKAT/GOL</th>
                            <th width="10%" class="text-center"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="ModalTambahPegawai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal m-l-20" id="FormTambahPegawai">
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Nama</label>
                        <div class="col-8">
                            <input class="form-control" type="text" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">NIP</label>
                        <div class="col-5">
                            <input class="form-control" type="text" id="nip" name="nip" maxlength="18" minlength="18">
                            <small class="text-danger">* NIP akan digunakan sebagai Username </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-month-input2" class="col-2 col-form-label">Sebagai Penilai</label>
                        <div class="col-8">
                            <select class="custom-select" id="penilai" name="penilai">
                                <option value="">-- Pilih --</option>
                                <option value="1">YA</option>
                                <option value="0">TIDAK</option>
                            </select>
                            <small class="text-danger">*Pilih YA jika Pegawai bersangkutan akan menilai SKP/PKP Pegawai lain </small>

                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Pangkat/Gol</label>
                        <div class="col-sm-5">
                            <div class="controls">
                                <select name="pangkat_gol_peg" id="pangkat_gol_peg" class="custom-select" data-placeholder="Pilih Pegawai" required data-validation-required-message="Tidak boleh Kosong">
                                    <option value="">--Pilih--</option>
                                    <optgroup label="GOLONGAN IV (Pembina)">
                                        <option value="Pembina Utama / IV.e">Pembina Utama / IV.e</option>
                                        <option value="Pembina Utama Madya / IV.d">Pembina Utama Madya / IV.d</option>
                                        <option value="Pembina Utama Muda / IV.c">Pembina Utama Muda / IV.c</option>
                                        <option value="Pembina Tingkat I / IV.b">Pembina Tingkat I / IV.b</option>
                                        <option value="Pembina / IV.a">Pembina / IV.a</option>
                                    </optgroup>
                                    <optgroup label="GOLONGAN III (Penata)">
                                        <option value="Penata Tingkat I / III.d">Penata Tingkat I / III.d</option>
                                        <option value="Penata / III.c">Penata / III.c</option>
                                        <option value="Penata Muda Tingkat I / III.b">Penata Muda Tingkat I / III.b</option>
                                        <option value="Penata Muda / III.a">Penata Muda / III.a</option>
                                    </optgroup>
                                    <optgroup label="GOLONGAN II (Pengatur)">
                                        <option value="Pengatur Tingkat I / II.d">Pengatur Tingkat I / II.d</option>
                                        <option value="Pengatur / II.c">Pengatur / II.c</option>
                                        <option value="Pengatur Muda Tingkat I / II.b">Pengatur Muda Tingkat I / II.b</option>
                                        <option value="Pengatur Muda / II.a">Pengatur Muda / II.a</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-month-input2" class="col-2 col-form-label">Jabatan</label>
                        <div class="col-6">
                            <select class="custom-select" id="id_jbt" name="id_jbt">
                                <option value="">-- Pilih Jabatan --</option>
                                <?php foreach ($jab as $u) { ?>
                                    <option value="<?php echo $u->id_jbt ?>"><?php echo $u->nm_jbt ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-month-input2" class="col-2 col-form-label">Pejabat Penilai</label>
                        <div class="col-8">
                            <select class="custom-select" id="id_penilai" name="id_penilai">
                                <option value="">-- Tidak Ada Pejabat Penilai --</option>
                                <?php foreach ($user as $u) { ?>
                                    <option value="<?php echo $u->id_user ?>"><?php echo $u->nama ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger">*Pejabat yang akan menilai SKP/PKP Pegawai bersangkutan </small><br>
                            <small class="text-danger">*Kosongkan jika pegawai bersangkutan tidak dinilai oleh Pegawai Lain </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Email</label>
                        <div class="col-5">
                            <input class="form-control" type="email" id="email" name="email">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="ModalEditPegawai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal m-l-20" id="FormEditPegawai">
                    <input class="form-control" hidden type="text" id="id_user" name="id_user">

                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Nama</label>
                        <div class="col-8">
                            <input class="form-control" type="text" id="nama_edit" name="nama_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">NIP</label>
                        <div class="col-5">
                            <input class="form-control" readonly type="text" id="nip_edit" name="nip_edit" maxlength="18" minlength="18">
                            <small class="text-danger">* NIP akan digunakan sebagai Username </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-month-input2" class="col-2 col-form-label">Penilai</label>
                        <div class="col-8">
                            <select class="custom-select" id="penilai_edit" name="penilai_edit">
                                <option value="">-- Pilih --</option>
                                <option value="1">YA</option>
                                <option value="0">TIDAK</option>
                            </select>
                            <small class="text-danger">*Pilih YA jika Pegawai bersangkutan akan menilai SKP/PKP Pegawai lain </small>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-month-input2" class="col-2 col-form-label">Jabatan</label>
                        <div class="col-6">
                            <select class="custom-select" id="id_jbt_edit" name="id_jbt_edit">
                                <option value="">-- Pilih Jabatan --</option>
                                <?php foreach ($jab as $u) { ?>
                                    <option value="<?php echo $u->id_jbt ?>"><?php echo $u->nm_jbt ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Pangkat/Gol</label>
                        <div class="col-sm-5">
                            <div class="controls">
                                <select name="pangkat_gol_peg_edit" id="pangkat_gol_peg_edit" class="custom-select" data-placeholder="Pilih Pegawai" required data-validation-required-message="Tidak boleh Kosong">
                                    <option value=""></option>
                                    <optgroup label="GOLONGAN IV (Pembina)">
                                        <option value="Pembina Utama / IV.e">Pembina Utama / IV.e</option>
                                        <option value="Pembina Utama Madya / IV.d">Pembina Utama Madya / IV.d</option>
                                        <option value="Pembina Utama Muda / IV.c">Pembina Utama Muda / IV.c</option>
                                        <option value="Pembina Tingkat I / IV.b">Pembina Tingkat I / IV.b</option>
                                        <option value="Pembina / IV.a">Pembina / IV.a</option>
                                    </optgroup>
                                    <optgroup label="GOLONGAN III (Penata)">
                                        <option value="Penata Tingkat I / III.d">Penata Tingkat I / III.d</option>
                                        <option value="Penata / III.c">Penata / III.c</option>
                                        <option value="Penata Muda Tingkat I / III.b">Penata Muda Tingkat I / III.b</option>
                                        <option value="Penata Muda / III.a">Penata Muda / III.a</option>
                                    </optgroup>
                                    <optgroup label="GOLONGAN II (Pengatur)">
                                        <option value="Pengatur Tingkat I / II.d">Pengatur Tingkat I / II.d</option>
                                        <option value="Pengatur / II.c">Pengatur / II.c</option>
                                        <option value="Pengatur Muda Tingkat I / II.b">Pengatur Muda Tingkat I / II.b</option>
                                        <option value="Pengatur Muda / II.a">Pengatur Muda / II.a</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-month-input2" class="col-2 col-form-label">Pejabat Penilai</label>
                        <div class="col-8">
                            <select class="custom-select" id="id_penilai_edit" name="id_penilai_edit">
                                <option value="">-- Tidak Ada Pejabat Penilai --</option>
                                <?php foreach ($user as $u) { ?>
                                    <option value="<?php echo $u->id_user ?>"><?php echo $u->nama ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger">*Pejabat yang akan menilai SKP/PKP Pegawai bersangkutan </small><br>
                            <small class="text-danger">*Kosongkan jika pegawai bersangkutan tidak dinilai oleh Pegawai Lain </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Email</label>
                        <div class="col-5">
                            <input class="form-control" type="email" id="email_edit" name="email_edit">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->