<?php
    session_start();
    if(!isset($_SESSION["Login"]))
    {
        echo $_SESSION["Login"];
        header("Location:Login.php");
        exit;
    }
require 'Functions.php';

//Menggunakan method get untuk mengambil id yang telah terseleksi oleh user dan dimasukkan
//kedalam variabel baru yaitu $id
$Id=$_GET["Id"];

if(Hapus ($Id)>0)
{
    echo "
    <script>
        alert ('data berhasil dihapus');
        document.location.href='Index.php';
    </script>";
}
else
{
    echo "
    <script>
        alert ('data gagal dihapus');
        document.location.href='Index.php';
    </script>";    
    echo "<br>";
    echo mysqli_error($conn);
}
?>