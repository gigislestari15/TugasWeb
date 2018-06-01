<?php

include "../../../koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus mahasiswa
if ($module=='mahasiswa' AND $act=='hapus'){
	$proses=$mysqli->query("delete from mahasiswa where nim='$_GET[nim]'");
	if($proses)
	{

	header('location:../../index.php?module=mahasiswa');
	}
	else {echo "gagal";}
}

// Input mahasiswa
elseif ($module=='mahasiswa' AND $act=='input'){
	$pass = md5($_POST['password']);
	$check2 ="INSERT INTO mahasiswa(nim,
		password,
		nama,
		alamat,
		no_hp,
		email,
		kelas,
		jurusan) 
							VALUES('$_POST[nim]',
								   '$pass',
								   '$_POST[nama]',
								   '$_POST[alamat]',
								   '$_POST[no_hp]',
								   '$_POST[email]',
								   '$_POST[kelas]',
								   '$_POST[jurusan]')";
	$aksi =mysqli_query($mysqli,$check2)
  or die("Error: ".mysqli_error($mysqli));
	
	if($aksi)
	{

	header('location:../../index.php?module=mahasiswa');
	}
	else {echo "gagal";}
}

// Update mahasiswa
elseif ($module=='mahasiswa' AND $act=='update'){
	if (empty($_GET[password])) {
		$pass = md5($_POST[password]);
		$tes = "UPDATE mahasiswa SET password = '$pass',nama	= '$_POST[nama]', alamat = '$_POST[alamat]', no_hp = '$_POST[no_hp]',
        	email = '$_POST[email]', kelas = '$_POST[kelas]', jurusan = '$_POST[jurusan]'
			WHERE nim = '$_POST[nim]'";
        $update=mysqli_query($mysqli,$tes)
  		or die("Error: ".mysqli_error($mysqli));
	}
	if($update)
	{

	header('location:../../index.php?module=mahasiswa');
	}
	else {echo "gagal";}
}


?>
