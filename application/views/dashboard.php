<div id="BtnSinkron"></div>
<script>
    var id_user = "<?php echo $this->session->userdata('ses_id') ?>"
</script>


<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">JANUARI</h2>
                <h6 class="text-white" id="jan"></h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">FEBRUARI</h2>
                <h6 class="text-white" id="feb"></h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">MARET</h2>
                <h6 class="text-white" id="mar"></h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">APRIL</h2>
                <h6 class="text-white" id="apr"></h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">MEI</h2>
                <h6 class="text-white" id="mei"></h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">JUNI</h2>
                <h6 class="text-white" id="jun"></h6>
            </div>
        </div>
    </div>
     <!-- Column -->
     <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">JULI</h2>
                <h6 class="text-white" id="jul"></h6>
            </div>
        </div>
    </div>
     <!-- Column -->
     <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">AGUSTUS</h2>
                <h6 class="text-white" id="ags"></h6>
            </div>
        </div>
    </div>
     <!-- Column -->
     <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">SEPTEMBER</h2>
                <h6 class="text-white" id="sep"></h6>
            </div>
        </div>
    </div>
     <!-- Column -->
     <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">OKTOBER</h2>
                <h6 class="text-white" id="okt"></h6>
            </div>
        </div>
    </div>
     <!-- Column -->
     <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">NOVEMBER</h2>
                <h6 class="text-white" id="nov"></h6>
            </div>
        </div>
    </div>
     <!-- Column -->
     <div class="col-md-6 col-lg-2 col-xlg-2">
        <div class="card">
            <div class="box bg-dark text-center">
                <h2 class="font-light text-white">DESEMBER</h2>
                <h6 class="text-white" id="des"></h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <?php echo $img ?>
                    <h4 class="card-title m-t-10"><?php echo $nama ?></h4>
                    <h6 class="card-subtitle"><?php echo $nm_jbt ?></h6>
                    <h6 class="card-subtitle">NIP. <?php echo $username ?></h6>

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
                <h4 class="card-title">Grafik Nilai Bulanan</h4>
                <div>
                    <canvas id="chart1" height="70"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>