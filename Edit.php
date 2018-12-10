<?php
    session_start();
    if(!isset($_SESSION["Login"]))
    {
        echo $_SESSION["Login"];
        header("Location:Login.php");
        exit;
    }
    //Menggunakan method get untuk mengambil id yang telah terseleksi oleh user dan dimasukkan
    //kedalam vaeiabel baru yaitu $id
    $Id=$_GET["Id"];
    //var_dump($id);
    require 'Functions.php';
    $Prk=query("SELECT * FROM Parkiran WHERE Id=$Id")[0];
    //var_dump($mhs);
    //cek apakah button submit sudah diklik atau belum
    if(isset($_POST['submit']))
    {
        //cek sukses data ditambah menggunakan function pada function.php
        if(edit($_POST>0))
        {
            echo "
        <script>
            alert('data berhasil diperbaharui');
            document.location.href='Index.php';
        </script>";
        }
        else
        {
            echo "
        <script>
            alert('data gagal diperbaharui');
            document.location.href='Edit.php';
        </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Data Kendaraan</title>
</head>
<body>
    <h1>Update Data Kendaraan</h1>
    <!--tambahkan atribut enctype-->
    <form action="" method="post" enctype="multipart/form-data">
    <li>
        <input type="hidden" name="Id" value="<?= $Prk["Id"] ?>">
        <input type="hidden" name="Plat_Nomor Lama" value="<?= $Prk["Plat_Nomor"] ?>">
    </li>
    <ul>
        <li>
            <!-- for pada label terhubung dengan id jadi jika tabel nama diklik maka text field nama akan aktif juga -->
            <label for="Plat_Nomor">Plat_Nomor :</label>
            <!-- untuk pengisian nama besar kecilnya harus sesuai dengan fieldnya -->
            <input type="text" name="Plat_Nomor" Id="Plat_Nomor" value="<?= $Prk["Plat_Nomor"]; ?>" >
        </li>
        <li>
            <label for="Jenis_Kendaraan">Jenis_Kendaraan :</label>
            <input type="text" name="Jenis_Kendaraan" Id="Jenis_Kendaraan" required value="<?= $Prk["Jenis_Kendaraan"]; ?>" >
        </li>
        <li>
            <label for="Nama_Kendaraan">Email :</label>
            <input type="text" name="Nama_Kendaraan" Id="Nama_Kendaraan" required value="<?= $Prk["Nama_Kendaraan"]; ?>" >
        </li>
        <li>
            <label for="Slot_Tempat">Jurusan :</label>
            <input type="text" name="Slot_Tempat" Id="Slot_Tempat" required value="<?= $Prk["Slot_Tempat"]; ?>" >
        </li>
        <li>
            <label for="Gambar">Gambar :</label>
            <img src="Gambar/<?= $Prk[Gambar];?>" alt="" height="100" width="100"><br>
            <input type="file" name="Gambar" Id="Gambar">
        </li>
        <li>
            <button type="submit" name="submit">Update</button>
        </li>
    </ul>
    </form>
</body>
</html>