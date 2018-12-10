<?php
    require 'Functions.php';

    if(isset($_POST['Registrasi']))
    {
        if(Registrasi($_POST)>0)
        {
            echo "
                <style>
                    alert('user berhasil ditambahkan');
                </style>";
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Registrasi</title>
    <style>
        label
        {
            display:block;
        }
        body
        {
            padding: 0;
            margin:0;
            min-width: 1000px;
            color: rgb(253, 253, 252);
            background-image: url('Gambar/background6.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:1400px 670px;
            background-position: center;
        } 
        a
        {
            font-style:normal;
            color:black;
            font-size:14;
            font-weight:bold;
        }
        h1
        {
            font-style: oblique;
            color: black;
            font-size:20;
        }
        label
        {
            font-style: oblique;
            color: black;
            font-size:14;
        }
    </style>
</head>
<body>
<ul class="nav nav-tabs">
    <li class="nav-item">
            <a class="nav-link" href="./Login.php">Login</a>
    </li>

</ul>
<h1> Halaman Registrasi </h1>
<form action="" method="post">
    <ul>

            <label for="Username">Username :</label>
            <input type="text" name="Username" Id="Username">
        
        
            <label for="Password">Password :</label>
            <input type="Password" name="Password" Id="Password">
        
        
            <label for="Password2">Konfirmasi Password :</label>
            <input type="Password" name="Password2" Id="Password2">

            <div class="form-group">
                <label for="Level">Level :</label>
					<select name="Level" class="form-control" required>
						<option value="">Pilih Level User</option>
						<option value="1">User</option>
						<!-- <option value="2">User</option> -->
					</select>
		    </div>

            <div class="form-group">
                <input type="submit" name="Registrasi" class="btn btn-primary btn-md" value="Registrasi" />
            </div>
        
    </ul>
</form>
</body>
</html>