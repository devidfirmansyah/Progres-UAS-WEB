<?php
// include('Akses1.php');
// include('Akses2.php');
session_start();
require 'Functions.php';

//cek cookie
if(isset($_COOKIE['Id']) && isset($_COOKIE['Username']))
{
    $Id=$_COOKIE['Id'];
    $key=$_COOKIE['key'];

    //ambil username berdasarkan id
    $result=mysqli_query($conn, "SELECT Username FROM Users WHERE Id=$Id");
    $row=mysqli_fetch_assoc($result);

    //cek cookie dan username
    // if($key===hash('sha256',$row['Username']))
    // {
    //     $_SESSION['Login']=true;
    // }
}

// if(isset($_SESSION["Login"]))
// {
//     echo $_SESSION["Login"];
//     header("Location:Login.php");
//     exit;
// }


if(isset($_POST["Login"]))
{
    $Username=$_POST["Username"];
    $Password=$_POST["Password"];
    $Level=$_POST["Level"];

    $result=mysqli_query($conn,"SELECT * FROM Users WHERE Username='$Username'");
    
    //cek username
    //mysqli_num_rows=untuk menghitung ada berapa baris yg akan dikembalikan parameter
    //kalau ada yg dikembalikan nilainya adalah 1 jika tidak ada nilainya 0

    if(mysqli_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['Username']=$row['Username'];
        $_SESSION['Password']=$row['Password'];
        $_SESSION['Level'] = $row['Level'];
        
        if($_SESSION['Level'] = 'User')
        {                    
            header("Location: Index.php");
        }
        else if($_SESSION['Level'] = 'Admin')
        {
            header("Location: Index2.php");
        }
        else
        {
            $error = "Failed Login";
        }
    }
        //var_dump($result);
        //cek password
        $row=mysqli_fetch_assoc($result);
        //var_dump($row);

        //digunakan untuk mengecek sebuah string apakah sama dengan hashnya
        //terdapat 2 parameter (password yg blm diacak, password yg sudah diacak)
        if(password_verify($Password,$row["Password"]))
        {
            //set session
            $_SESSION["Login"]=true;

            //cek remember me
            if(isset($_POST['remember']))
            {
                //enkripsi cookie mwnggunkan hash tipe sha256
                setcookie('ID',$row['ID'], time()+60);
                setcookie('key', hash(sha256,$row['Username']),time()+60);
            }

            //redirect ke halaman index.php
            header("Location:Index.php");
            exit;
        }

    $error=true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Halaman Login</title>
    <style>
    body
    {
        padding: 0;
        margin:0;
        min-width: 1000px;
        color: rgb(253, 253, 252);
        background-image: url('Gambar/background10.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size:1400px 670px;
        background-position: center;
    } 
    h1
    {
        font-family: sans;
        font-style: oblique;
        color: red;
        font-size:32pt;
    }
    button
    { 
        color: black; 
        background-color: white; 
    }
    input
    {
        color: black; 
        background-color: white; 
    }
    a
    {
        font-style: normal;
        color: red;
        font-size:20;
        font-weight:bold;
    }
    </style>
</head>
<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="./Registrasi.php">Registrasi</a>
        </li>
    </ul>  

    <h1>Halaman Login</h1>

    <?php
    if(isset($error))
    :?>

    <p style="color:red;font-style=bold">
    Terjadi Kesalahan, Harap Cek Kembali</p>

    <?php endif?>
    
    <form role="form" form action="" method="post">
    <ul>
        <div class="form-group">
            <label for="Username">Username :</label>
            <input type="text" name="Username" placeholder="Masukkan Username" required autofocus />
		</div>
        
        <div class="form-group">
            <label for="Password">Password :</label>
            <input type="Password" name="Password" placeholder="Masukkan Password" required autofocus />
        </div>

        <div class="form-group">
        <label for="Level">Level :</label>
					<select name="level" class="form-control" required>
						<option value="">Pilih Level User</option>
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
		</div>

            <input type="checkbox" name="remember" Id="remember">
            <label for="remember">Remember Me</label>
        </br>   
		
        <div class="form-group">
			<input type="submit" name="login" class="btn btn-primary btn-md" value="Login" />
		</div>
             
    </ul>
    </form>
</body>
</html>