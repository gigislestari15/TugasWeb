
<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-home"></i> Home 
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php
                $tanggal = date('Y-m-d');
                $tanggalFinal = tgl_info($tanggal);
                $time = date('h:i:s');
                ?>
                <h3 class="panel-title" align="right"><i class="glyphicon glyphicon-calendar"></i> <?php echo "<font face='tahoma' size='2'>$tanggalFinal | $time</font>"; ?></h3>
            </div>
        </div>
    </div>
</div>
<ol class="breadcrumb">
    <li class="active">
        <a href="index.php?module=home">Home</a>
    </li>
</ol>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                SELAMAT DATANG 
                            </div>
                        </div>

                        <img src="../image/Easy-University-to-Get-Into.jpg" style="width: 700px; height: 400px;">
                        <br>
                        <h5>Anda dapat menambahkan, melihat, dan mengubah data mahasiswa dan nilai mahasiswa</h5>
                        <h6>* Nilai yang diperoleh 20% Absen, 20% Tugas, 20% UTS, 40% UAS </h6>
                        <div class="form-group" style="margin-left: 5px">
                </div>

            </div>
        </form>
    </div>
</div>
<?php