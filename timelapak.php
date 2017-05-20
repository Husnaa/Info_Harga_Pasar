
<?php
	session_start();
	if(isset($_POST["submit"])){

	$nama=trim($_POST["nama"]);
	$jenis=trim($_POST["jenis"]);
	$alamat=trim($_POST["alamat"]);
	$date=date("d - m - Y");
	$id=$_SESSION['rpl'];
	
	$error="";
	
	
	if($error==""){

		include("konek.php");
		
		$login="INSERT INTO kedai (nama_kedai,jenis_kedai,alamat,time,id_fk)  VALUES ('$nama','$jenis','$alamat',$date,'$id')";
		$input=mysqli_query($conn,$login);
			if($input){
				header('location:uploaddagangan.php');
			}
			else{
				echo "<script>alert('nama lapak sudah digunakan')</script>";
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
		<style>
body {
	margin: 0 auto;
	background-image: url(img/tiga.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-size: 100% 720px;
}

.container{
	width: 450px;
	text-align: center;
	background-color: rgba(62, 73, 94,0.95) ;
	border-radius: 10px;
	padding:20px;
	margin: 0 auto;
	margin-top: 50px;
}

.container h3{
	color: white;
	font-size: 40px;
	font-family: "bebas neue"
}

nav {
	font-size: 25px;
	font-family: "bebas neue"
}

form{

	margin-top: 20px;
	text-align: center;
}


input {
	height: 45px;
	width: 300px;
	font-size: 17px;
	padding-left: 10px;
	margin-bottom: 20px;
}

		</style>
</head>
<body>

		<nav class="navbar navbar-inverse">

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		      </ul>
		</nav>


		<div class="container">
		<h3>Create Your Keude</h3>
		 <form action="#" method="post">
		 	<div class="form-input">
				<input type ="text" name="nama" placeholder="nama lapak" required="required">
			</div>
			<div class="form-input">
				<input type="text" name="jenis" placeholder="jenis dagangan" required="required" >
			</div>
			<div class="form-input">
				<input type="text" name="alamat" placeholder="alamat" required="required" >
			</div>
			<input class="btn btn-primary" type="submit" name="submit" value="daftar">
		 </form>
		</div>
</body>
</html>