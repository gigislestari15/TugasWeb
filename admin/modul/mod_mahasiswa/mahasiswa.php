<script language="javascript">
    function validasi(form){
        if (form.username.value == ""){
            alert("Anda belum mengisikan username.");
            form.username.focus();
            return (false);
        }

        if (form.password.value == ""){
            alert("Anda belum mengisikan password.");
            form.password.focus();
            return (false);
        }

        if (form.nama.value == ""){
            alert("Anda belum mengisikan Nama Lengkap.");
            form.nama.focus();
            return (false);
        }
    }
</script>
<?php
error_reporting(0);
$module = $_GET['module'];
$aksi = "modul/mod_mahasiswa/aksi_mahasiswa.php";
switch($_GET[act]){
// Tampil mahasiswa
default:
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-list-alt"></i> Manajemen mahasiswa
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
            <a href="index.php?module=mahasiswa">Manajemen mahasiswa</a>
        </li>
    </ol>
<div class="panel panel-primary">
    <div class="panel-heading">

        <div class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Daftar mahasiswa <i></i></div>
    </div>
    <div class="panel-body">
        <table id="tablekonten" class="table table-striped table-bordered table-responsive" style="">
            <thead>
            <th width="1%"><div id="konten">No</div></th>
            <th width="10%"><div id="konten">Nim</div></th>
            <th width="10%"><div id="konten">Nama Lengkap</div></th>
            <th width="10%"><div id="konten">Email</div></th>
            <th width="10%"><div id="konten">No Hp</div></th>
            <th width="10%"><div id="konten">Aksi</div></th>

            </thead>
            <tbody>
            <?php
            $tampil = mysqli_query($mysqli,"SELECT * FROM mahasiswa ORDER BY nim ASC");
            $no=1;
            while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                    <td><div id="kontentd"><?php echo $no; ?></div></td>
                    <td><div id="kontentd"><?php echo $r['nim'];?></div></td>
                    <td><div id="kontentd"><?php echo $r['nama'];?></div></td>
                    <td><div id="kontentd"><a href="mailto:<?php echo $r['email']; ?>"><?php echo $r['email'];?></a>
                    <td><div id="kontentd"><?php echo $r['no_hp'];?></div></td>
                    <td><div id="kontentd"><a href="?module=mahasiswa&act=viewmahasiswa&nim=<?php echo $r['nim'];?>">
                        <button class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-list-alt"></span></button></a>
                        <a href="?module=mahasiswa&act=editmahasiswa&nim=<?php echo $r['nim'];?>">
                        <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-wrench"></span></button></a> 
                        <a href="<?php echo $aksi;?>?module=mahasiswa&act=hapus&nim=<?php echo $r['nim'];?>"><button class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-trash"></span></button></a></div>
                    </td>
                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <button class="btn btn-success btn-sm " onclick="window.location.href='?module=mahasiswa&act=tambahmahasiswa'"><span class="glyphicon glyphicon-plus"></span> Tambah mahasiswa</button>
    </div>
</div>
<?php
break;

case "tambahmahasiswa":

    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="glyphicon glyphicon-list-alt"></i> Manajemen mahasiswa
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
            <a href="index.php?module=mahasiswa">Manajemen mahasiswa</a> / <a href="index.php?module=mahasiswa&act=tambahmahasiswa">Tambah mahasiswa</a>
        </li>
    </ol>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Tambah mahasiswa </div>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo $aksi;?>?module=mahasiswa&act=input" onSubmit="return validasi(this)" class="form-horizontal" >
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">NIM</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <input type="text" name="nim" class="form-control" placeholder="Nim">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_user" class="col-sm-2 control-label">Nama mahasiswa</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jurusan" class="col-sm-2 control-label">Jurusan</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-random"></span>
                        </div>
                        <select name="jurusan" id="" class="form-control">
                            <option value="0">--Pilih Jurusan--</option>
                            <option value="Tehnik Informatika">Tehnik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Komputer Akutansi">Komputer Akutansi</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp" class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <select name="kelas" id="" class="form-control">
                            <option value="0">--Pilih Kelas--</option>
                            <option value="17.8A.33">17.8A.33</option>
                            <option value="17.8B.33">17.8B.33</option>
                            <option value="17.8C.33">17.8C.33</option>
                            <option value="16.8A.33">16.8A.33</option>
                            <option value="16.8B.33">16.8B.33</option>
                            <option value="16.8C.33">16.8C.33</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp" class="col-sm-2 control-label">No Hp</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="no_hp" class="form-control" placeholder="No Hp">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button> &nbsp;<button class="btn btn-danger" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                </div>

            </div>
        </form>
    </div>
    <div class="panel-footer">
        <i ><button class="btn btn-success btn-sm " onclick="window.location.href='?module=mahasiswa'"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></i>
    </div>
</div>
<?php
break;

case "editmahasiswa":
$edit=mysqli_query($mysqli,"SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
$r=mysqli_fetch_array($edit);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-list-alt"></i> Manajemen mahasiswa
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.php?module=mahasiswa">Manajemen mahasiswa</a> / <a href="?module=mahasiswa&act=editmahasiswa&nim=<?php echo $r['nim'];?>">Edit mahasiswa</a>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <i class="glyphicon glyphicon-wrench"></i> Edit mahasiswa
        </div>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo $aksi ?>?module=mahasiswa&act=update"  class="form-horizontal" >
            <input type="hidden" name="nim" value="<?php echo $r[nim]; ?>">
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">NIM</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <input type="text" disabled="" name="nim" class="form-control" placeholder="nim" value="<?php echo $r[nim];?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </div>
                        <input type="text" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama mahasiswa</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $r[nama];?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jurusan" class="col-sm-2 control-label">Jurusan</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <select name="jurusan" id="" class="form-control">
                            <option value="Tehnik Informatika" <?php if($r[jurusan]=="Tehnik Informatika"){echo 'selected';} ?>>Tehnik Informatika</option>
                            <option value="Sistem Informasi" <?php if($r[jurusan]=="Sistem Informasi"){echo 'selected';} ?>>Sistem Informasi</option>
                            <option value="Manajemen Informatika" <?php if($r[jurusan]=="Manajemen Informatika"){echo 'selected';} ?>>Manajemen Informatika</option>
                            <option value="Komputer Akutansi" <?php if($r[jurusan]=="Komputer Akutansi"){echo 'selected';} ?>>Komputer Akutansi</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <select name="kelas" id="" class="form-control">
                            <option value="17.8A.33" <?php if($r[kelas]=="17.8A.33"){echo 'selected';} ?>>17.8A.33</option>
                            <option value="17.8B.33" <?php if($r[kelas]=="17.8B.33"){echo 'selected';} ?>>17.8B.33</option>
                            <option value="17.8C.33" <?php if($r[kelas]=="17.8C.33"){echo 'selected';} ?>>17.8C.33</option>
                            <option value="16.8A.33" <?php if($r[kelas]=="16.8A.33"){echo 'selected';} ?>>16.8A.33</option>
                            <option value="16.8B.33" <?php if($r[kelas]=="16.8B.33"){echo 'selected';} ?>>16.8B.33</option>
                            <option value="16.8C.33" <?php if($r[kelas]=="16.8C.33"){echo 'selected';} ?>>16.8C.33</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $r[alamat];?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp" class="col-sm-2 control-label">No Hp</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="no_hp" class="form-control" placeholder="No Hp" value="<?php echo $r[no_hp];?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $r[email];?>">
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin-left: 5px">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button> &nbsp;<button class="btn btn-danger" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                </div>

            </div>
            <blockquote class="blockquote-reverse">
                <i><font size="1">*) Apa bila password tidak dirubah maka kosongkan saja..!</font>  </i>
            </blockquote>
        </form>
    </div>
</div>
<?php
break;


case "viewmahasiswa":
$view=mysqli_query($mysqli,"SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
$r=mysqli_fetch_array($view);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-list-alt"></i> Manajemen mahasiswa
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.php?module=mahasiswa">Manajemen mahasiswa</a> / <a href="?module=mahasiswa&act=viewmahasiswa&nim=<?php echo $r['nim'];?>">View mahasiswa</a>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <i class="glyphicon glyphicon-wrench"></i> View mahasiswa
        </div>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo $aksi ?>?module=mahasiswa&act=update"  class="form-horizontal" >
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">NIM</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[nim];?> <input type="hidden" name="nama" value="<?php echo $r[nama];?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama mahasiswa</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[nama];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jurusan" class="col-sm-2 control-label">Jurusan</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[jurusan];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[kelas];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[alamat];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp" class="col-sm-2 control-label">No Hp</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[no_hp];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[email];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin-left: 5px">
                    <button class="btn btn-danger" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span> Kembali </button>
                </div>

            </div>
        </form>
    </div>
</div>
<?php
break;

}