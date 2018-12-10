<?php

    //membuat koneksi
    $conn=mysqli_connect("localhost","root","","DevidF_TI2D");
    //Cek koneksi
    if(!$conn)
    {
        die('Koneksi Error : '.mysqli_connect_errno()
        .' - '.mysqli_connect_error());
    }
    //ambil data dari tabel parkiran/query data parkiran
    $result=mysqli_query($conn,"SELECT * FROM Parkiran");
    
    //function query
    function query($query_kedua)
    {
        global $conn;
        $result = mysqli_query($conn,$query_kedua);
        $rows =[];
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        return $rows;
    }

    function tambah_data($data)
    {
        global $conn;

        $Plat_Nomor=$_POST["Plat_Nomor"];
        $Jenis_Kendaraan=$_POST["Jenis_Kendaraan"];
        $Nama_Kendaraan=$_POST["Nama_Kendaraan"];
        $Slot_Tempat=$_POST["Slot_Tempat"];
        $Gambar=$_POST["Gambar"];

        $query= "INSERT INTO Parkiran VALUES
                ('','$Plat_Nomor','$Jenis_Kendaraan','$Nama_Kendaraan','$Slot_Tempat','$Gambar')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    function Hapus($Id)
    {
        global $conn;
        mysqli_query($conn,"DELETE FROM Parkiran WHERE Id=$Id ");
        return mysqli_affected_rows($conn);
    }

    function Edit($data)
    {
        global $conn;

        $Id=$data["Id"];
        $Plat_Nomor=htmlspecialchars($data["Plat_Nomor"]);
        $Jenis_Kendaraan=htmlspecialchars($data["Jenis_Kendaraan"]);
        $Nama_Kendaraan=htmlspecialchars($data["Nama_Kendaraan"]);
        $Slot_Tempat=htmlspecialchars($data["Slot_Tempat"]);
        $Gambar=htmlspecialchars($data["Gambar"]);

        $query = "UPDATE Parkiran SET
                    Plat_Nomor = '$Plat_Nomor',
                    Jenis_Kendaraan = '$Jenis_Kendaraan',
                    Nama_Kendaraan = '$Nama_Kendaraan',
                    Slot_Tempat = '$Slot_Tempat'
                    Gambar = '$Gambar'
                    WHERE Id = '$Id'";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword)
    {
        $sql="SELECT * FROM Parkiran
        WHERE
        Plat_Nomor LIKE '%$keyword%' OR
        Jenis_Kendaraan LIKE '%$keyword%' OR
        Nama_Kendaraan LIKE '%$keyword%' OR
        Slot_Tempat LIKE '%$keyword%'
        ";

        //Kembalikan ke function query dengan parameter $sql
    return query($sql);

    }

    function Registrasi($data)
    {
        global $conn;

        $Username = strtolower(stripcslashes($data["Username"]));
        $Password = mysqli_real_escape_string($conn,$data["Password"]);
        $Password2= mysqli_real_escape_string($conn,$data["Password2"]);
        $Level    = strtolower(stripcslashes($data["Level"]));

        $result = mysqli_query($conn,"SELECT Username FROM Users WHERE Username='$Username'");
  
            if($Level == 1)
            {
                $_SESSION['Username']=$Username;
                $_SESSION['Level']='User';
                // header("Location: Index.php");
                // $Password=password_hash($Password,PASSWORD_DEFAULT);

                mysqli_query($conn,"INSERT INTO Users VALUES('','$Username','$Password','$Level')");
                return mysqli_affected_rows($conn);
            }
            // else if($Level == 2)
            // {
            //     $_SESSION['Username']=$Username;
            //     $_SESSION['Level']='User';
            //     // header("Location: Index2.php");
            //     $Password=password_hash($Password,PASSWORD_DEFAULT);

            //     mysqli_query($conn,"INSERT INTO Users VALUES('','$Username','$Password','$Level')");
            //     return mysqli_affected_rows($conn);
            // }
            else
            {
                echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
            }
        
    }
        
        // if(mysqli_fetch_assoc($result))
        // {
        //     echo "
        //     <script>
        //         alert('username sudah ada');
        //     </script>
        //     ";

        //     return false;
        // }

        // if($Password!==$Password2)
        // {
        //     echo "
        //     <script>
        //         alert('password anda tidak sama');
        //     </script>
        //     ";

        //     return false;
        // }

        // $Password=password_hash($Password,PASSWORD_DEFAULT);

        // mysqli_query($conn,"INSERT INTO Users VALUES('','$Username','$Password','$Level')");
        // return mysqli_affected_rows($conn);
    
?>