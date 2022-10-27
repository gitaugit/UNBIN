<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Karyawan</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "config.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan Nama NIK
    if (isset($_GET['NIK'])) {
        $NIK=input($_GET["NIK"]);

        $sql="select * from karyawan where NIK=$NIK";
        $hasil=mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $NIK=htmlspecialchars($_POST["NIK"]);
        $Nama=input($_POST["Nama"]);
        $Kode_Departement=input($_POST["Kode_Departement"]);
        $Gender=input($_POST["Gender"]);
        $Gaji_pokok=input($_POST["Gaji_pokok"]);
        $Tunjangan=input($_POST["Tunjangan"]);

        //Query update data pada tabel anggota
        $sql="update karyawan set
        Nama='$Nama',
			Kode_Departement='$Kode_Departement',
			Gender='$Gender',
			Gaji_pokok='$Gaji_pokok',
			Tunjangan='$Tunjangan'
			where NIK=$NIK";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:proseslog.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="Nama" class="form-control" value="<?php echo $data['Nama']; ?>" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Kode_Departement:</label>
            <input type="text" name="Kode_Departement" class="form-control" value="<?php echo $data['Kode_Departement']; ?>" placeholder="Masukan Kode_Departement" required/>

        </div>
        <div class="form-group">
            <label>Gender:</label>
            <textarea name="Gender" class="form-control" rows="5" placeholder="Masukan Gender" required><?php echo $data['Gender']; ?></textarea>

        </div>
        <div class="form-group">
            <label>Gaji_pokok:</label>
            <input type="Gaji_pokok" name="Gaji_pokok" class="form-control" value="<?php echo $data['Gaji_pokok']; ?>" placeholder="Masukan Gaji_pokok" required/>
        </div>
        <div class="form-group">
            <label>Tunjangan:</label>
            <input type="text" name="Tunjangan" class="form-control" value="<?php echo $data['Tunjangan']; ?>" placeholder="Masukan No HP" required/>
        </div>

        <input type="hidden" name="NIK" value="<?php echo $data['NIK']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
