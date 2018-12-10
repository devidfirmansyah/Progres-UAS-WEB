<?php

// require('Akses1.php');
session_start();
if(!isset($_SESSION["Login"]))
{
    echo $_SESSION["Login"];
    header("Location:Login.php");
    exit;
}

    // if($_SESSION)
    // {
    //     if($_SESSION['Level']=="Admin")
    //     {
    //         header("Location: Index.php");
    //     }
    //     if($_SESSION['Level']=="User")
    //     {
    //         header("Location: Index2.php");
    //     }
    // }
    

    require 'Functions.php';
    $Parkiran=query("SELECT * FROM Parkiran");

    //tombol cari ditekan
    //cari pada line 7 adalah name dari buton
    if(isset($_POST["cari"]))
    {
        //cari line 10 adalah function cari dan keyboard adalah name dari inputan text
        $Parkiran=cari($_POST["keyword"]);
    }
?>

<html lang="en">
    <head>
        <meta charsey="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- <link rel="stylesheet" href="Parkir.css" type="text/css"/> -->
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <title>Data Parkiran</title>
        
    <style>
    body
    {
        padding: 0;
        margin:0;
        min-width: 1000px;
        color: rgb(253, 253, 252);
        background-image: url('Gambar/background18.jpg');        
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size:1400px 670px;
        background-position: center;
    } 
    a
    {
        font-style: oblique;
        color: White;
        font-size:20;
    }
    
    h1
    {
        color: red;
        font-size-adjust: inherit;
        font-style: italic;
    }
    th
    {
        background-color:blue;
    }
    td
    {
        background-color:black;
    }
    </style>

    </head>
    <body>
    
    <ul class="nav nav-bar">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./tambah_data.php">Tambah Kendaraan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Logout.php">Logout</a>
        </li>
    </ul>  
    

    <h1><center>Daftar Parkiran</h1>

        <br>
        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian Kendaraan" autocomplete="off">
            <button type="submit" name=cari> Cari </button>
        </form>
        <br>
        <div class="container">
        <center><table border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Plat_Nomor</th>
            <th>Jenis_Kendaraan</th>
            <th>Nama_Kendaraan</th>
            <th>Slot_Tempat</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>
        <?php $i=1 ?>
        <?php foreach($Parkiran as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Plat_Nomor"]; ?></td>
            <td><?= $row["Jenis_Kendaraan"]; ?></td>
            <td><?= $row["Nama_Kendaraan"]; ?></td>
            <td><?= $row["Slot_Tempat"]; ?></td>
            <td><img src="Gambar/<?php echo $row["Gambar"]; ?>" alt="" scrset="" width="100" height="100"></td>
            <td>
                <a href="Edit.php?Id=<?php echo $row["Id"];?>">Edit</a>
                <a href="Hapus.php?Id=<?php echo $row["Id"]; ?>"onclick="return confirm('Apakah data ini akan dihapus')">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach;?>
        </table></center>  
    </body>
</html>

