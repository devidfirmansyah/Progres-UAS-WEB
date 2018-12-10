<?php
    session_start();
    if(!isset($_SESSION["Login"]))
    {
        echo $_SESSION["Login"];
        header("Location:Login.php");
        exit;
    }
    require 'Functions.php';
    //cek apakah button submit sudah diklik atau belum
    if(isset($_POST['submit']))
    {
        //cek isi dari post menggunakan vardump
        //var_dump($_POST);
        //var_dump($_FILES);
        //die();

        if(tambah_data($_POST>0))
        {
            echo "
            <script>
                alert('Data Berhasil Disimpan');
                document.location.href='Index.php';
            </script>";
        }
        else
        {
            echo "
            <script>
                alert('Data Gagal Disimpan');
                document.location.href='tambah_data.php';
            </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <style>
    body
    {
        padding: 0;
        margin:0;
        min-width: 1000px;
        color: rgb(253, 253, 252);
        background-image: url('Gambar/background9.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size:1400px 670px;
        background-position: center;
    } 
    a
    {
        font-style: oblique;
        color: red;
        font-size:20;
    }
    h1
    {
        font-family: sans;
        font-style: oblique;
        color: red;
        font-size:32pt;
    }
</style>
</head>
<body>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="./Index.php">Data Kendaraan</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="./Logout.php">Logout</a>
    </li>
</ul>

    <h1><center>Tambah Data Kendaraan</h1>
    <div class="container">
    <table class="table table-grey">
    <thead>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        
            <!-- for pada label terhubung dengan id jadi jika tabel nama diklik maka text field nama akan aktif juga -->
            <label for="Plat_Nomor">Plat_Nomor: </label>
            <!-- untuk pengisian nama besar kecilnya harus sesuai dengan fieldnya -->
            <input type="text" name="Plat_Nomor" Id="Plat_Nomor">
        <br>
            
            <label for="Jenis_Kendaraan">Jenis_Kendaraan: </label>
            <input type="radio" name="Jenis_Kendaraan" value="R4">R4
            <input type="radio" name="Jenis_Kendaraan" value="R2">R2
        <br>

            <label for="Nama_Kendaraan">Nama_Kendaraan: </label>
            <input type="text" name="Nama_Kendaraan" Id="Nama_Kendaraan" required>
        <br>

            <label for="Slot_Tempat">Slot_Tempat: </label>
            <input type="text" name="Slot_Tempat" Id="Slot_Tempat" required>
        <br>
        
            <label for="Gambar">Gambar</label>
            <input type="text" name="Gambar" Id="Gambar" required>
        <br>

            <button type="submit" name="submit">Tambah</button>
        
    </ul>
    </form>
</body>
</html>