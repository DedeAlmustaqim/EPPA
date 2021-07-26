<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/logo_pn.png">
    <title><?php echo $judul ?></title>
    <link href="<?php echo base_url() ?>dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>dist/css/style.min.css" rel="stylesheet">
</head>

<body class="skin-default card-no-border" style="background-image: url('<?php echo base_url() ?>assets/images/bg-pn.jpg'); background-repeat: no-repeat;  background-size: 100% 100%;">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>

    <section id="wrapper">
        <!-- <div class="login-register" style="background-image:url(<?php echo base_url() ?>assets/images/background/login-register.jpg);"> -->
        <div class="login-register">
            <div class="login-box card">
                <div class="card-body">
                    <center>
                        <img src="<?php echo base_url() ?>assets/images/logo_pn.png" alt="logo" width="50px" />
                    </center><br>
                    <form class="form-horizontal form-material" action="<?php echo base_url() ?>login/auth" method="post" novalidate="">

                        <h3 class="text-center m-b-0">EPPA V.1.19052021</h3>
                        <?php if ($this->session->flashdata('no_user')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="mdi mdi-close-box-multiple-outline"></i><small>
                                    <?php echo $this->session->flashdata('no_user'); ?></small>
                            </div> <?php } ?>
                        <?php if ($this->session->flashdata('cap_error')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="mdi mdi-close-box-multiple-outline"></i><small>
                                    <?php echo $this->session->flashdata('cap_error'); ?></small>
                            </div> <?php } ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" maxlength="18" name="username" placeholder="NIP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4 text-left control-label col-form-label">Password </label>
                            <div class="col-sm-8">
                                <div class="controls">
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="password" name="password"  required minlength="8" maxlength="20" data-validation-required-message="Tidak Boleh Kosong">
                                        <div class="input-group-append">
                                            <span class="input-group-text pass"> <i class="mdi mdi-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" id="password" required="" placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text passlogin"> <i class="mdi mdi-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="ta">
                                <option value="">Pilih Tahun</option>
                                <option value="2021">2021</option>

                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <?= $image; ?><br><br>
                            </div>
                            <div class="col-sm-12">
                                <input name="captcha_kode" placeholder="Captcha" class="form-control" maxlength="10" required data-validation-required-message="Tidak Boleh Kosong">
                            </div>

                            <div class="help-block"></div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Masuk</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
    <script>
        $('.pass-login').hover(function() {
            $('#password').attr('type', 'text');
        }, function() {
            $('#password').attr('type', 'password');
        });
    </script>

    <script src="<?php echo base_url() ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });

        $('.passlogin').hover(function() {
            $('#password').attr('type', 'text');
        }, function() {
            $('#password').attr('type', 'password');
        });
    </script>

</body>

</html>