<?php
    session_start();
    if(!isset($_SESSION["Login"]))
    {
        echo $_SESSION["Login"];
        header("Location:Login.php");
        exit;
    }

    //cek apakah button submit sudah ditekan atau belum
    if(isset($_POST['submit']))
    {
        //ambil data dari tiap elemen dalam form yang disimpan di variable baru
        
        $Plat_nomor=$_POST["Plat_Nomor"];
        $Jenis_Kendaraan=$_POST["Jenis_Kendaraan"];
        $Nama_Kendaraan=$_POST["Nama_Kendaraan"];
        $Slot_Tempat=$_POST["Slot_Tempat"];
        $Gambar=$_POST["Gambar"];

        //query insert data
        $query="INSERT INTO Parkiran 
                VALUES
                ('','$Plat_nomor','$Jenis_Kendaraan','$Nama_Kendaraan','$Slot_Tempat','$Gambar')";
        mysqli_query($conn,$query);

        //cek sukses data ditambah menggunakan mysqli_affected_rows
        //jika kita var_dump maka akan muncul int(1) jika gagal maka akan muncul int(-1)
        //var_dump(mysqli_affected_rows($conn));
    }
?>


