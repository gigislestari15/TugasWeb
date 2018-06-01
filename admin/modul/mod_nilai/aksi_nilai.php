<?php

include "../../../koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus nilai
if ($module=='nilai' AND $act=='hapus'){
	$proses=$mysqli->query("delete from nilai where id_nilai='$_GET[id_nilai]'");
	if($proses)
	{

	header('location:../../index.php?module=nilai');
	}
	else {echo "gagal";}
}

// Input nilai
elseif ($module=='nilai' AND $act=='input'){
	$check2 ="INSERT INTO nilai(id_nilai,
		nim,
		absen,
		tugas,
		uts,
		uas) 
							VALUES('$_POST[id_nilai]',
								   '$_POST[nim]',
								   '$_POST[absen]',
								   '$_POST[tugas]',
								   '$_POST[uts]',
								   '$_POST[uas]')";
	$aksi =mysqli_query($mysqli,$check2)
  or die("Error: ".mysqli_error($mysqli));
	
	if($aksi)
	{

	header('location:../../index.php?module=nilai');
	}
	else {echo "gagal";}
}

// Update nilai

elseif ($module=='nilai' AND $act=='update'){
        $tes = "UPDATE nilai SET absen = $_POST[absen], tugas = $_POST[tugas], uts	= '$_POST[uts]', uas = '$_POST[uas]'
			WHERE id_nilai = '$_POST[id_nilai]'";
        $update=mysqli_query($mysqli,$tes)
        or die("Error: ".mysqli_error($mysqli));
    if($update)
    {

        header('location:../../index.php?module=tiket');
    }
    else {echo "gagal";}
}
?>
