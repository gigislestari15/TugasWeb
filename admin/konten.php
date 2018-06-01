		<?php

		$module = empty($_GET['module'])?:$_GET['module'];
		if ($module == 'home'){
			include "modul/mod_home/home.php";
		}
		else if ($module == 'nilai'){
			include "modul/mod_nilai/nilai.php";
		}
		else{
			include "modul/mod_mahasiswa/mahasiswa.php";
		}
		?>
	