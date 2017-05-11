<?php
	if(isset($_POST["submit"])){

	$nama=trim($_POST["nama"]);
	$username=trim($_POST["username"]);
	$password=trim($_POST["password"]);
	$email=trim($_POST["email"]);
	$lahir=trim($_POST["lahir"]);
	$nomor=trim($_POST["nomor"]);
	

	$error="";
	
	
	if($error==""){

		include("konek.php");
		
		$syntax="INSERT INTO user VALUES ('$nama','$username','$email','$lahir','$nomor')";
		$input=mysqli_query($conn,$syntax);
		
		$login="INSERT INTO akun  VALUES ('$username','$password')";
		$input=mysqli_query($conn,$login);
			if($input){
				echo"<script>confirm('Pendaftaran berhasil Klik ok untuk verifikasi akun')
	 location.replace('login.html') </script>";
			}
			else{
				echo "<script>confirm('username sudah digunakan')
			location.replace('signup.php') </script>";
			}
		}
	}
	else{
		$error="";
		$nama=""; 
		$username="";
		$password="";
		$email="";
		$lahir="";
		$nomor="";
	}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- memanggil bootstrap & css-->
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>

		<nav class="navbar navbar-inverse">

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="login.html">Login</a></li>
		      </ul>
		</nav>


		<div class="container">
		<h3>Sign Up</h3>
		 <form action="#" method="post">
		 	<div class="form-input">
				<input type ="text" name="nama" placeholder="Nama" required="required">
			</div>
			<div class="form-input">
				<input type="text" name="username" placeholder="username" required="required" >
			</div>
				<input type="password" name="password" placeholder="password" required="required" >
			<div>
				<input type="email" name="email" placeholder="email" required="required" >
			</div>
			<div>
				<input type="date" name="lahir" placeholder="Tanggal Lahir" required="required" >
			</div>
			<div>
				<input type="number" name="nomor" placeholder="Nomor HP" required="required" >
			</div>
			<input class="btn btn-primary" type="submit" name="submit" value="daftar">
			<button type="reset" class="btn btn-primary"><i class="glyphicon glyphicon-repeat"></i>  Reset</button>
		 </form>
		</div>
</body>
</html>