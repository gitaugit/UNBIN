<table border="1" width=100%>
    <tr>
        <td>id_tamu</td>
        <td>nama</td>
        <td>email</td>
        <td>pesan</td>
</tr>


<?php
$koneksi=mysqli_connect("localhost","root","","belajar") or
die("koneksi ke database gagal");

$sql=mysqli_query($koneksi,"select * from tamu");
$no=0;
while($data=mysqli_fetch_array($sql)){
    $no++;
?>

<tr>
    <td><?php echo $data['id_tamu']?></td>
    <td><?php echo $data['nama']?></td>
    <td><?php echo $data['email']?></td>
    <td><?php echo $data['pesan']?></td>
</tr>

<?php } ?>
