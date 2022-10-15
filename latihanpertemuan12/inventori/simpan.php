<?php
$koneksi = mysqli_connect('localhost','root','','inventori');
$query="insert into mahasiswa values('$_POST[id]','$_POST[nama]')";
mysqli_query($koneksi,$query);
header("location:mahasiswa.php");
?>