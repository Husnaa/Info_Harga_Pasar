
<?php
	session_start();
	if(isset($_POST["submit"])){

	$nama=trim($_POST["nama"]);
	$jenis=trim($_POST["jenis"]);
	$alamat=trim($_POST["alamat"]);
	$id=$_SESSION['rpl'];
	
	$error="";
	
	
	if($error==""){

		include("konek.php");
		
		$login="INSERT INTO kedai (nama_kedai,jenis_kedai,alamat,foto,id_fk)  VALUES ('$nama','$jenis','$alamat','kedai.png','$id')";
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

<?php
	if (isset($_POST["resmi"])) {
		
		$error = $_FILES["file_upload1"]["error"];
		if($error===0){
			
			$pesan_error ="kamu kok ganteng ya..";
			
			$nama_folder1="dataresmi";
			$nama_folder2="dataresmi";
			$nama_folder3="dataresmi";
			$tmp1 =$_FILES["file_upload1"]["tmp_name"];
			$tmp2 =$_FILES["file_upload2"]["tmp_name"];
			$tmp3 =$_FILES["file_upload3"]["tmp_name"];
			$nama_file1=$_FILES["file_upload1"]["name"];
			$nama_file2=$_FILES["file_upload2"]["name"];
			$nama_file3=$_FILES["file_upload3"]["name"];
			move_uploaded_file($tmp1,"$nama_folder1/$nama_file1");
			move_uploaded_file($tmp2,"$nama_folder2/$nama_file2");
			move_uploaded_file($tmp3,"$nama_folder3/$nama_file3");
			
			include('konek.php');
			$uid=mysqli_real_escape_string($conn,$_SESSION["rpl"]);
			
			
			$query1="INSERT INTO resmi VALUES ('$nama_file1','$nama_file2','$nama_file3','$uid')";
			$hasil1=mysqli_query($conn,$query1);
			if($hasil1){
				echo "<script>alert('Data anda sudah dikirim, cek email untuk info selanjutnya')
			location.replace('welcome.php') </script>";
			}
			
			
		}
	}
	?>
<!DOCTYPE html>
<html>
<head>
  <!-- memanggil bootstrap & css-->
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--boostrap modal-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
body {
	margin: 0 auto;
	background-image: url(flower.jpg);
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
		<h3>Bangun Kedai Mu</h3>
		 <form action="#" method="post">
		 	<div class="form-input">
				<input type ="text" name="nama" placeholder="nama kedai" required="required">
			</div>
			<div class="form-input">
				<input type="text" name="jenis" placeholder="jenis dagangan" required="required" >
			</div>
			<div class="form-input">
				<input type="text" name="alamat" placeholder="alamat" required="required" >
			</div>
			<input class="btn btn-primary" type="submit" name="submit" value="daftar">
		 </form>
		 <br>
		 <p style="color:white">Bangun kedai resmi anda, lihat <a href="" style="color:red" data-toggle="modal" data-target="#myModalkr">Persyaratan</a></p>
		</div>
		
		<!--modal kedai resmi-->
		<div class="modal fade" id="myModalkr" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Syarat bangun kedai resmi</h4>
					</div>
					<div class="modal-body">
					<div class="bgcs">
					<ol>
						<li>Upload scan surat izin usaha dagang anda, dibawah </li>
						<li>Upload scan KTP anda, dibawah</li>
						<li>Upload scan Kartu Keluarga, dibawah</li>
						<li>File tersebut diupload dengan ukuran max 2mb</li>
					</ol>
					</div>
					<br>
					<hr>
					<form action="#" method="post" enctype="multipart/form-data">
						
							<center>Upload Usaha Dagang (UD)<input type="file" name="file_upload1" /></center>
							<center>Upload KTP<input type="file" name="file_upload2"></center>
							<center>Upload KK<input type="file" name="file_upload3"></center>
						
					
					</div>
		
					<div class="modal-footer">
					<input type="submit" class="btn btn-default" style="float:right;" value="Publish"  name="resmi" />
				    <button style="float:right; " type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
</body>
</html>