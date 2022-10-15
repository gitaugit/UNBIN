<?php
$koneksi = mysqli_connect('localhost','root','','inventori');
$query="delete from mahasiswa where id='$_GET[id]'";
mysqli_query($koneksi,$query);
header("location:mahasiswa.php");
?>