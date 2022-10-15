<?php
$koneksi=mysqli_connect('localhost','root','','inventori');
$query="select * from mahasiswa";
$hasil=mysqli_query($koneksi,$query);
while($baris=mysqli_fetch_array($hasil))
{
    echo $baris['id']." ".$baris['nama'],"
    <a href='ubah.php?id=".$baris['id']."'>ubah</a>
    <a href='hapus.php?id=".$baris['id']."'>hapus</a></br>";
}
?>
<a href='form_tambah.php'>Tambah</a>