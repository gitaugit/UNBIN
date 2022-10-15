<?php
$koneksi = mysqli_connect('localhost','root','','inventori');
$query="update mahasiswa set nama='$_POST[nama]' where id = '$_POST[id]'";
mysqli_query($koneksi,$query);
header("location:mahasiswa.php");
?>