<?php
ob_start();
session_start();
include '../koneksi.php';
$user=$_POST['username'];
$pass=md5($_POST['pswd']);

$query = mysqli_query($mysqli,"select * from admin where username='$user' and password_admin='$pass'");
if(mysqli_num_rows($query) > 0)
{
    echo "sukses";
    $_SESSION['status_login']=1;
    $_SESSION['username']=$user;
    header("location:../admin/index.php");
}
else
{
    echo 'invalid';
    header("location:../admin/index.php");
}

?>
