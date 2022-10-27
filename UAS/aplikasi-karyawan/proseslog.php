<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>
 
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h2>Aplikasi <span>Karyawan</span></h2>
      </div>
      <div class="right_area">
      <form action="" method="POST" class="login-username">
            <?php echo $_SESSION['username']?>
        <a href="logout.php" class="logout_btn">Logout</a>
      </div>
      
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="1.png" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="#"><i class="fas fa-cogs"></i><span>Menu Karyawan</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="#"><i class="fas fa-cogs"></i><span>Menu Karyawan</span></a>
    </div>
     <!-- Load file CSS Bootstrap offline -->
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h4>Tabel Karyawan</h4>
<?php

    include "config.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['NIK'])) {
        $NIK=htmlspecialchars($_GET["NIK"]);

        $sql="delete from karyawan where NIK='$NIK' ";
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:login.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


<table border="1" width=100%>

        <br>
        <thead>
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Kode Departement</th>
            <th>Gender</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "config.php";
        $sql="select * from karyawan order by NIK desc";

        $hasil=mysqli_query($conn,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["NIK"]; ?></td>
                <td><?php echo $data["Nama"];   ?></td>
                <td><?php echo $data["Kode_Departement"];   ?></td>
                <td><?php echo $data["Gender"];   ?></td>
                <td><?php echo $data["Gaji_pokok"];   ?></td>
                <td><?php echo $data["Tunjangan"];   ?></td>
                <td>
                    <a href="update.php?NIK=<?php echo htmlspecialchars($data['NIK']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?NIK=<?php echo $data['NIK']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

  </body>
</html>
      
