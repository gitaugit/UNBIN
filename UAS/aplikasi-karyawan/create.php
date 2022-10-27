<!DOCTYPE html>
<html>
<head>
    <title>Form Penambahan Karyawan</title>
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
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $NIK=input($_POST["NIK"]);
        $Nama=input($_POST["Nama"]);
        $Kodedepartement=input($_POST["Kode_Departement"]);
        $Gender=input($_POST["Gender"]);
        $Gajipokok=input($_POST["Gaji_pokok"]);
        $Tunjangan=input($_POST["Tunjangan"]);

        //Query input menginput data kedalam tabel karyawan
        $sql="insert into karyawan (NIK,Nama,Kode_Departement,Gender,Gaji_pokok,Tunjangan) values
		('$NIK','$Nama','$Kodedepartement','$Gender','$Gajipokok','$Tunjangan')";

        //Mengeksekusi/menjalankan query diatas
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
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>NIK:</label>
            <input type="text" name="NIK" class="form-control" placeholder="Masukan NIK" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>Kode_Departement:</label>
            <textarea name="Kode_Departement" class="form-control" rows="5"placeholder="Masukan Kode_Departement" required></textarea>

        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="Gender" name="Gender" class="form-control" placeholder="Masukan Gender" required/>
        </div>
        <div class="form-group">
            <label>Gaji_pokok:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan Gaji_pokok" required/>
        </div>
        <div class="form-group">
            <label>Tunjangan:</label>
            <input type="text" name="Tunjangan" class="form-control" placeholder="Masukan Tunjangan" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
