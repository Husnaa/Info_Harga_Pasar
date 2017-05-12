<?php
	
	if (isset($_POST["submit"])) {
		
		$error = $_FILES["file_upload"]["error"];
		
	
		
			$nama_dagangan=$_POST["nama_dagangan"];
			$harga=$_POST["harga"];
			$foto_barang=$_POST["foto_barang"];
			$nama_folder="folder upload";
			$tmp =$_FILES["file_upload"]["tmp_name"];
			$nama_file=$_FILES["file_upload"]["name"];
			move_uploaded_file($tmp,"$nama_folder/$nama_file");
			
			include('konek.php');
			$nama_dagangan=mysqli_real_escape_string($conn,$nama_dagangan);
			$harga=mysqli_real_escape_string($conn,$harga);
			$foto_barang=mysqli_real_escape_string($conn,$foto_barang);
			
			
			$query1="INSERT INTO dagangan VALUES ('$nama_dagangan','$harga','$foto_barang','a')";
			$hasil1=mysqli_query($conn,$query1);
	}
?>

<!DOCTYPE html>
<html>
<head>
  <!-- memanggil bootstrap & css-->
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
body {
	margin: 0 auto;
	background-color: #555;
	background-repeat: no-repeat;
	background-size: cover;
	background-size: 100% 720px;
}

.container{
	width: 450px;
	height: 530px;
	text-align: center;
	background-color: rgba(52, 73, 94,0.75) ;
	border-radius: 4
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

}
		</style>
</head>
<body>

		<nav class="navbar navbar-inverse">

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="login.html">Login</a></li>
		      </ul>
		</nav>
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Upload your photo </button>
			
			<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-sm">
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div>
        <div class="modal-body">
		<form action="#" method="post" enctype="multipart/form-data">
			<p><input type="file" name="file_upload"></p>
			<p><input type="text" name="nama_dagangan" placeholder="nama dagangan"></p>
			<p><input type="text" name="harga" placeholder="harga"></p>
			
			<input type="submit" name="submit" value="save">
		</form>
        </div>
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
		
					
		
</body>
</html>