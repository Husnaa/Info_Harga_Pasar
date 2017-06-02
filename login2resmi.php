<?php
	session_start();
	if(isset($_POST["submit"])){
		
		$username=$_POST["user"];
		$password=$_POST["pass"];
		
		$perror="";
		
		include("konek.php");
		
		$username = mysqli_real_escape_string($conn,$username);
		$password = mysqli_real_escape_string($conn,$password);
		
		$query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
		$hasil = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($hasil) == 0 )  { 
			$perror = "Username atau Password tidak sesuai";
		}
		
		elseif ($perror === "") {
			$query="select * from user where username='$username'";
					$tampil=mysqli_query($conn,$query);
					while($data=mysqli_fetch_array($tampil)){
						$_SESSION["rpl"]=$data['id'];
					}
			header('location:buatlapakresmi.php');
		}
		
	}
	 else{
		 $perror="";
		 $username="";
		 $password="";
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
	background-image: url(bg3.JPG);
	background-repeat: no-repeat;
	background-size: cover;
	background-size: 100% 720px;
}

.container{
	width: 450px;
	text-align: center;
	background-color: rgba(0, 0, 0,0.60) ;
	border-radius: 10px;
	padding:20px;
	margin: 0 auto;
	margin-top: 150px;
}

.container h3{
	color: white;
	font-size: 30px;
	font-family: Rainbow Bridge Personal Use;
	font-size: 40px;
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

		

		<div class="container">
		<h3>Bangun Kedai Resmi Anda</h3>
		 <form action="#" method="post">
		 	<div class="form-input">
				<input type ="text" name="user" placeholder="username" required="required">
			</div>
			<div class="form-input">
				<input type="password" name="pass" placeholder="password" required="required" >
			</div>
			<input class="btn btn-primary" style="width:100px" type="submit" name="submit" value="Daftar">
		 </form>
		 <?php
		if($perror !==""){
			echo "<p style='color:red'>$perror</p>";
		}
		?>
		</div>
		
</body>
</html>