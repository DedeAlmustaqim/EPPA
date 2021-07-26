<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon.png">
  <title><?php echo $judul ?></title>
  <!-- Custom CSS -->
  <link href="<?php echo base_url() ?>dist/css/style.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
  <link href="<?php echo base_url() ?>assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-green fixed-layout">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="loader">
      <div class="loader__figure"></div>
      <p class="loader__label">EPPA</p>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
            <!-- Logo icon --><b>
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <!-- <img src="<?php echo base_url() ?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> -->
              <!-- Light Logo icon -->
              <!-- <img src="<?php echo base_url() ?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
            </b>
            <!--End Logo icon -->
            <!-- Logo text --><span>
              <!-- dark Logo text -->
              <!-- <img src="<?php echo base_url() ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
              <!-- Light Logo text -->
              <!-- <img src="<?php echo base_url() ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
            </span>
          </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav mr-auto">
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
            <!-- ============================================================== -->

          </ul>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
          <ul class="navbar-nav my-lg-0">



            </li>
            <!-- ============================================================== -->
            <!-- End User Profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown u-pro show">
              <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down"><?php echo $this->session->userdata('ses_nm') ?> &nbsp;<i class="mdi mdi-arrow-down-drop-circle"></i></span> </a>
              <div class="dropdown-menu dropdown-menu-right animated flipInY ">
                <!-- text-->
                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> Profile</a>

                <!-- text-->
                <a href="<?php echo base_url() ?>login/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                <!-- text-->
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav">
            <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>dashboard" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>


            <?php $akses = $this->session->userdata('akses') ?>
            <?php if (($akses == 1) || ($akses == 2)) { ?>
              <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Setting</span></a>
                <ul aria-expanded="false" class="collapse">
                  <li><a href="<?php echo base_url() ?>master/setting_bln">Jadwal</a></li>
                  <li><a href="<?php echo base_url() ?>pegawai">Pegawai</a></li>
                </ul>
              </li>
            <?php } ?>

            <?php if ($akses == 3) { ?>

              <li><a href="<?php echo base_url() ?>pkp">PKP Bulanan</a></li>
              <li><a href="<?php echo base_url() ?>pkp/nilai_pkp">Penilaian PKP</a></li>
            <?php } ?>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
          <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">EPPA Tahun <?php echo $this->session->userdata('ta') ?> </h4>
          </div>
          <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $judul ?></li>
              </ol>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <?php echo $konten ?>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
          <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
            <div class="r-panel-body">
              <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
              </ul>

            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
      © 2021 PN Tamiang Layang
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script>
    var BASE_URL = "<?php echo base_url() ?>"
  </script>
  <script src="<?php echo base_url() ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="<?php echo base_url() ?>assets/node_modules/popper/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="<?php echo base_url() ?>dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!--Wave Effects -->
  <script src="<?php echo base_url() ?>dist/js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="<?php echo base_url() ?>dist/js/sidebarmenu.js"></script>
  <!--stickey kit -->
  <script src="<?php echo base_url() ?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
  <!--Custom JavaScript -->
  <script src="<?php echo base_url() ?>dist/js/custom.min.js"></script>

  <!-- This is data table -->
  <script src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>

  <!-- Js aplikasi -->
  <script src="<?php echo base_url() ?>assets/dashboard.js?n=<?php echo date('Y-m-d') ?>"></script>
  <script src="<?php echo base_url() ?>assets/pkp.js?n=<?php echo date('Y-m-d') ?>"></script>
  <script src="<?php echo base_url() ?>assets/master.js?n=<?php echo date('Y-m-d') ?>"></script>
  <script src="<?php echo base_url() ?>assets/clear_modal.js?n=<?php echo date('Y-m-d') ?>"></script>
  <script src="<?php echo base_url() ?>assets/pegawai.js?n=<?php echo date('Y-m-d') ?>"></script>
  <script src="<?php echo base_url() ?>assets/apps.js?n=<?php echo date('Y-m-d') ?>"></script>
  <?php if ($this->session->userdata('akses') == 2) { ?>
    <script src="<?php echo base_url() ?>assets/admin.js?n=<?php echo date('Y-m-d') ?>"></script>

  <?php } ?>
  <!-- Sweet-Alert  -->
  <script src="<?php echo base_url() ?>assets/node_modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/sweetalert/jquery.sweet-alert.custom.js"></script>

</body>

</html>