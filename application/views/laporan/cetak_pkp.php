<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin-top: 40px;
            margin-left: 60px;
            margin-right: 60px;
            margin-bottom: 40px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 10px;
            right: 10px;
            height: 50px;

            /** Extra personal styles **/
            color: #000000;
            text-align: center;
            line-height: 30px;
        }

        table {
            border-collapse: collapse;
        }



        footer {
            position: fixed;
            bottom: -40px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            color: #000000;
            text-align: right;
            line-height: 35px;
        }

        h1 {
            display: block;
            font-size: 1.3em;
            margin-top: 0.2em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h2 {
            display: block;
            font-size: 1.2em;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h3 {
            display: block;
            font-size: 1.0em;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h4 {
            display: block;
            font-size: 0.8em;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .body {
            font-size: 14px;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            padding: 2;
        }

        .text-center {
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            padding: 2;
            text-align: center;
        }

        .text-left {
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            padding: 2;
            text-align: left;
        }
    </style>
</head>

<body class="body">
    <center>
        <h2>FORMULIR PENILAIAN CAPAIAN KINERJA BULANAN</h2>
        <h2>PEGAWAI NEGERI SIPIL*</h2>
    </center>
    <br>
    <table width="100%" align="center" border="1" cellpadding="4">

        <tr align="center">
            <td width="3%">NO</td>
            <td>IDENTITAS</td>
            <td width="35%">PEJABAT PENILAI</td>
            <td width="35%">PEGAWAI NEGERI YANG DINILAI</td>
        </tr>
        <tr>
            <td>1.</td>
            <td>NAMA</td>
            <td><?php echo $nama_p ?></td>
            <td><?php echo $nama ?></td>
        </tr>
        <tr>
            <td>2.</td>
            <td>NIP</td>
            <td><?php echo $username_p ?></td>
            <td><?php echo $username ?></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>PANGKAT/GOL. RUANG</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>JABATAN</td>
            <td><?php echo $nm_jbt_p ?></td>
            <td><?php echo $nm_jbt ?></td>
        </tr>
        <tr>
            <td>5.</td>
            <td>UNIT KERJA</td>
            <td>PENGADILAN NEGERI TAMIANG LAYANG</td>
            <td>PENGADILAN NEGERI TAMIANG LAYANG</td>
        </tr>
    </table>
    <br><br>

    <?php

    $data['indikator'] = $this->m_pkp->get_indikator( $this->uri->segment(3));

    foreach ($data['indikator'] as $cat) {
        echo "<b>INDIKATOR KINERJA :" . $cat['indikator'] . "</b><br>";

    ?>
        <table width="100%" border="1" cellpadding="4">
            <thead>
                <tr align="center">
                    <th rowspan="2">NO</th>
                    <th width="40%" rowspan="2">KEGIATAN TUGAS JABATAN </th>
                    <th rowspan="2">AK</th>
                    <th colspan="3">TARGET</th>
                    <th rowspan="2">AK</th>
                    <th colspan="3">REALISASI</th>
                    <th rowspan="2">NILAI CAPAIAN KINERJA</th>
                </tr>
                <tr align="center">
                    <th>KUANT/ OUTPUT</th>
                    <th>SATUAN</th>
                    <th>KUAL/ MUTU</th>
                    <th>KUANT/ OUTPUT</th>
                    <th>SATUAN</th>
                    <th>KUAL/ MUTU</th>
                </tr>
                <tr align="center">
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
                </tr>
                <?php

                $data['kegiatan'] = $this->m_pkp->get_keg($cat['id_indikator']);
                $no = 1;
                foreach ($data['kegiatan'] as $keg) { ?>
                    <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td><?php echo $keg['keg'] ?></td>
                        <td align="center"><?php echo $keg['ak_target'] ?></td>
                        <td align="center"><?php echo $keg['output_target'] ?></td>
                        <td><?php echo $keg['satuan_target'] ?></td>
                        <td align="center"><?php echo $keg['mutu_target'] ?></td>
                        <td align="center"><?php echo $keg['ak_real'] ?></td>
                        <td align="center"><?php echo $keg['output_real'] ?></td>
                        <td><?php echo $keg['satuan_real'] ?></td>
                        <td align="center"><?php echo $keg['mutu_real'] ?></td>
                        <td align="center"><?php echo $keg['nilai_kin_keg'] ?></td>

                    <?php


                }
                    ?>
                    </tr>
                    <tr>
                        <td colspan="10" align="center"><b>NILAI CAPAIAN KINERJA</b></td>
                        <td align="center"><b><?php echo $cat['nilai'] ?></b></td>
                    </tr>
            </thead>
        </table><br>
    <?php
    }
    ?>

    <footer><small>Print By ePPA - PN Tamiang Layang</small></footer>
</body>

</html>