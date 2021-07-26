<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30">
                    <div class="col-12">
                        <img src="<?php echo base_url() ?>/assets/images/users/<?php echo $img ?>" class="img-circle" width="150">
                        <h4 class="card-title m-t-10"><?php echo $nama ?></h4>
                        <h6 class="card-subtitle">NIP. <?php echo $username ?></h6>
                        <div class="col-4"> <label>Upload Foto Profil</label>
                        </div>
                        <div class="col-8">
                            <?php echo form_open("profil/img_pf", array('enctype' => 'multipart/form-data')); ?>
                            <input type="text" hidden name="id_user_img" value="<?php echo $id_user ?>">
                            <div class="form-group">
                                <input type="file" name="img_pf" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"> <i class="mdi mdi-upload"></i> Upload</button>
                        </form>
                    </div>
                </center>
            </div>
            <div>
                <hr>
            </div>

        </div>
    </div>
    <!-- column -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <?php echo form_open("profil/update_pf", array('enctype' => 'multipart/form-data')); ?>
                <input class="form-control" hidden value="<?php echo $id_user ?>" type="text" id="id_user" name="id_user">

                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Nama</label>
                    <div class="col-6">
                        <input class="form-control" type="text" id="nama_pf" name="nama_pf" value="<?php echo $nama ?>">
                    </div>
                    <div class="col-2">
                    <button type="button" class="btn waves-effect waves-light btn-success" onClick="UbahPass(this)" data-id="<?php echo $this->session->userdata('ses_id')?>">Ubah Password</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">NIP</label>
                    <div class="col-5">
                        <input class="form-control" readonly type="text" id="nip_pf" name="nip_pf" maxlength="18" minlength="18" value="<?php echo $username ?>">
                        <small class="text-danger">* NIP akan digunakan sebagai Username </small>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <label for="example-month-input2" class="col-2 col-form-label">Sebagai Penilai</label>
                    <div class="col-2">
                        <?php if ($penilai == 0) {
                            $penilai_x = "TIDAK";
                        } else {
                            $penilai_x = "YA";
                        } ?>
                        <input class="form-control" readonly type="text" id="penilai_pf" name="penilai_pf" value="<?php echo $penilai_x ?>">


                    </div>

                </div>

                <div class="form-group row">
                    <label for="example-month-input2" class="col-2 col-form-label">Jabatan</label>
                    <div class="col-6">
                        <select disabled class="custom-select" id="id_jbt_pf" name="id_jbt_pf">
                            <option value="<?php echo $id_jbt ?>"><?php echo $nm_jbt ?></option>
                            
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-month-input2" class="col-2 col-form-label">Pejabat Penilai</label>
                    <div class="col-4">
                        <select disabled class="custom-select" id="id_penilai_pf" name="id_penilai_pf">
                            <option value="<?php echo $id_penilai ?>"><?php echo $nama_p ?></option>

                        </select>
                        <small class="text-danger">*Pejabat yang akan menilai SKP/PKP Pegawai bersangkutan </small><br>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Email</label>
                    <div class="col-5">
                        <input class="form-control" type="email" id="email_pf" name="email_pf" value="<?php echo $email ?>">
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </center>


                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="ModalUbahPass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Ubah Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" novalidate id="FormUbahPass">
            <input type="text" class="form-control" hidden  id="id_user_pass" name="id_user_pass" value="<?php echo $this->session->userdata('ses_id_unit') ?>">

            <div class="card-body">
              <div class="form-group row">
                <label for="fname" class="col-sm-3 text-left control-label col-form-label">Password Baru</label>
                <div class="col-sm-5">
                  <div class="controls">
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" id="pass" name="pass" placeholder="Minimal 8 Karakter" required minlength="8" maxlength="20" data-validation-required-message="Tidak Boleh Kosong">
                      <div class="input-group-append">
                        <span class="input-group-text pass"> <i class="mdi mdi-eye"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="fname" class="col-sm-3 text-left control-label col-form-label">Ulangi Password</label>
                <div class="col-sm-5">
                  <div class="controls">
                    <div class="input-group mb-3">
                      <input type="password" name="pass2" id="pass2" data-validation-match-match="pass" class="form-control" data-validation-required-message="Tidak Boleh Kosong" required="" aria-invalid="false">
                      <div class="input-group-append">
                        <span class="input-group-text pass2"> <i class="mdi mdi-eye"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group m-b-0 text-center">
                  <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                  <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Batal</button>
                </div>
              </div>
          </form>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>