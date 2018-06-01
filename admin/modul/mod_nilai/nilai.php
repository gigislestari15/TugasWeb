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
$aksi = "modul/mod_nilai/aksi_nilai.php";
switch($_GET[act]){
// Tampil nilai
default:
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-list-alt"></i> Manajemen nilai
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
            <a href="index.php?module=nilai">Manajemen nilai</a>
        </li>
    </ol>
<div class="panel panel-primary">
    <div class="panel-heading">

        <div class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Daftar nilai <i></i></div>
    </div>
    <div class="panel-body">
        <table id="tablekonten" class="table table-striped table-bordered table-responsive" style="">
            <thead >
            <th width="1%" ><div id="konten">No</div></th>
            <th width="10%"><div id="konten">NIM</div></th>
            <th width="10%"><div id="konten">Nama</div></th>
            <th width="15%">
            	<table class="table-bordered">
            	<th colspan="4" ><div id="konten" align="center">Nilai</div></th>
            	<tr>
            		<td width="1%" align="center"><div id="konten">Absen</div></td>
            		<td width="1%" align="center"><div id="konten">Tugas</div></td>
            		<td width="1%" align="center"><div id="konten">Uts</div></td>
            		<td width="1%" align="center"><div id="konten">Uas</div></td>
            	</tr>
        		</table>
            </th>
            <th width="5%" ><div id="konten">Jumlah</div></th>
            <th width="10%" ><div id="konten">Aksi</div></th>

            </thead>
            <tbody>
            <?php
                    $tampil= mysqli_query($mysqli,"SELECT nilai.* , mahasiswa.nama
                    FROM nilai, mahasiswa WHERE nilai.nim = mahasiswa.nim ORDER BY nilai.nim ASC");
            $no=1;
            while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                    <td><div id="kontentd"><?php echo $no; ?></div></td>
                    <td><div id="kontentd"><?php echo $r['nim'];?></div></td>
                    <td><div id="kontentd"><?php echo $r['nama'];?></div></td>
                    <td>
                    	<table class="table-bordered" width="100%">
                    	<tr align="center">
                    		<td><div id="kontentd"><?php echo $r['absen'];?></div></td>
                    		<td><div id="kontentd"><?php echo $r['tugas'];?></div></td>
                    		<td><div id="kontentd"><?php echo $r['uts'];?></div></td>
                    		<td><div id="kontentd"><?php echo $r['uas'];?></div></td>
                    	</tr>
                    	</table>
                    </td>
                    <td align="center"><div id="kontentd"><?php $a=(20*$r['absen']/100)+(20*$r['tugas']/100)+(20*$r['uts']/100)+(40*$r['uas']/100); echo $a; ?></div></td>
                    <td><div id="kontentd"><a href="?module=nilai&act=viewnilai&id_nilai=<?php echo $r['id_nilai'];?>">
                        <button class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-list-alt"></span></button></a>
                        <a href="?module=nilai&act=editnilai&id_nilai=<?php echo $r['id_nilai'];?>">
                        <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-wrench"></span></button></a> 
                        <a href="<?php echo $aksi;?>?module=nilai&act=hapus&id_nilai=<?php echo $r['id_nilai'];?>"><button class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-trash"></span></button></a></div>
                    </td>
                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <button class="btn btn-success btn-sm " onclick="window.location.href='?module=nilai&act=tambahnilai'"><span class="glyphicon glyphicon-plus"></span> Tambah nilai</button>
    </div>
</div>
<?php
break;

case "tambahnilai":

    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="glyphicon glyphicon-list-alt"></i> Manajemen nilai
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
            <a href="index.php?module=nilai">Manajemen nilai</a> / <a href="index.php?module=nilai&act=tambahnilai">Tambah nilai</a>
        </li>
    </ol>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Tambah nilai </div>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo $aksi;?>?module=nilai&act=input" onSubmit="return validasi(this)" class="form-horizontal" >
            <div class="form-group">
                    <label for="nim" class="col-sm-2 control-label">NIM</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-tags"></span>
                            </div>
                            <select name="nim" id="input" class="form-control" required="required">
                                <option value="0" >--Masukan NIM--</option>

                                <?php
                                include'koneksi.php';
                                $proses=$mysqli->query("SELECT * FROM mahasiswa");

                                while ($data=$proses->fetch_object()) {
                                    ?>
                                    <option value="<?php echo $data->nim ?>"><?php echo $data->nim ?> </option>

                                <?php } ?>

                            </select>
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <label for="nama_user" class="col-sm-2 control-label">Nilai Absen</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="absen" class="form-control" placeholder="Nilai Absen">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_user" class="col-sm-2 control-label">Nilai Tugas</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="tugas" class="form-control" placeholder="Nilai Tugas">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_user" class="col-sm-2 control-label">Nilai UTS</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="uts" class="form-control" placeholder=" Nilai UTS">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp" class="col-sm-2 control-label">Nilai UAS</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="uas" class="form-control" placeholder="Nilai UAS">
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
        <i ><button class="btn btn-success btn-sm " onclick="window.location.href='?module=nilai'"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></i>
    </div>
</div>
<?php
break;

case "editnilai":
$edit=mysqli_query($mysqli,"SELECT * FROM nilai WHERE id_nilai='$_GET[id_nilai]'");
$r=mysqli_fetch_array($edit);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-list-alt"></i> Manajemen nilai
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.php?module=nilai">Manajemen nilai</a> / <a href="?module=nilai&act=editnilai&id_nilai=<?php echo $r['id_nilai'];?>">Edit nilai</a>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <i class="glyphicon glyphicon-wrench"></i> Edit nilai
        </div>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo $aksi;?>?module=nilai&act=update" onSubmit="return validasi(this)"  class="form-horizontal" >
        	<input type="hidden" name="id_nilai" value="<?php echo $r[id_nilai]; ?>">
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
                <label for="password" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </div>
                        <?php
                        $name=mysqli_query($mysqli,"SELECT nilai.* , mahasiswa.nama
                    	FROM nilai, mahasiswa WHERE nilai.nim = mahasiswa.nim and nilai.id_nilai= '$_GET[id_nilai]'");
						$a=mysqli_fetch_array($name);
						?>
                        <input type="text" name="nama" disabled="" class="form-control" placeholder="Nama" value="<?php echo $a[nama];?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nilai Absen</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="absen" class="form-control" placeholder="Absen" value="<?php echo $r[absen];?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nilai Tugas</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="tugas" class="form-control" placeholder="Tugas" value="<?php echo $r[tugas];?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nilai UTS</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="uts" class="form-control" placeholder="UTS" value="<?php echo $r[uts];?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nilai UAS</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <input type="text" name="uas" class="form-control" placeholder="UAS" value="<?php echo $r[uas];?>">
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


case "viewnilai":
$view=mysqli_query($mysqli,"SELECT * FROM nilai WHERE id_nilai='$_GET[id_nilai]'");
$r=mysqli_fetch_array($view);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-list-alt"></i> Manajemen nilai
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.php?module=nilai">Manajemen nilai</a> / <a href="?module=nilai&act=viewnilai&id_nilai=<?php echo $r['id_nilai'];?>">View nilai</a>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <i class="glyphicon glyphicon-wrench"></i> View nilai
        </div>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo $aksi ?>?module=nilai&act=update"  class="form-horizontal" >
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">NIM</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[nim];?> <input type="hidden" name="nama" value="<?php echo $r[nim];?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Mahasiswa</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        	<?php
                        $name=mysqli_query($mysqli,"SELECT nilai.* , mahasiswa.nama
                    	FROM nilai, mahasiswa WHERE nilai.nim = mahasiswa.nim and nilai.id_nilai= '$_GET[id_nilai]'");
						$a=mysqli_fetch_array($name);
						?>
                        <?php echo $a[nama];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jurusan" class="col-sm-2 control-label">Nilai Absen</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[absen];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kelas" class="col-sm-2 control-label">Nilai Tugas</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[tugas];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Nilai UTS</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[uts];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp" class="col-sm-2 control-label">Nilai UAS</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags"></span>
                        </div>
                        <div class="form-control">
                        <?php echo $r[uas];?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">Total Nilai</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </div>
                        <div class="form-control">
                        <?php $a=(20*$r['absen']/100)+(20*$r['tugas']/100)+(20*$r['uts']/100)+(40*$r['uas']/100); echo $a; ?>
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