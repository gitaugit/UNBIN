<table border="1" width=100%>
    <tr>
        <td>Kode Barang</td>
        <td>Nama Barang</td>
        <td>Kode Jenis</td>
        <td>Harga Net</td>
        <td>Harga Jual</td>
        <td>Stok</td>
</tr>


<?php
$koneksi=mysqli_connect("localhost","root","","inventori") or
die("koneksi ke database gagal");

$sql=mysqli_query($koneksi,"select * from barang");
$no=0;
while($data=mysqli_fetch_array($sql)){
    $no++;
?>

<tr>
    <td><?php echo $data['kodebarang']?></td>
    <td><?php echo $data['namabarang']?></td>
    <td><?php echo $data['kodejenis']?></td>
    <td><?php echo $data['Harganet']?></td>
    <td><?php echo $data['Hargajual']?></td>
    <td><?php echo $data['stok']?></td>
</tr>

<?php } ?>
