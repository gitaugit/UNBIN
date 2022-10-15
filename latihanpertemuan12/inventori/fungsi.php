<?php
$koneksi=mysqli_connect('localhost','root','','inventori');
$query="select * from mahasiswa";
$hasil=mysqli_query($koneksi,$query);
while($baris=mysqli_fetch_array($hasil))
{
    echo $baris['id']." ".$baris['nama'],";
}
?>