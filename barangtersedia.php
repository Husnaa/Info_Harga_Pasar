<?php
	session_start();
	include('konek.php');
	$id=$_SESSION["rpl"];
	$query2="SELECT * FROM dagangan WHERE id_fk='$id'";
	$hasil2=mysqli_query($conn,$query2);
?>
<?php
	
	if (isset($_POST["submit"])) {
		$error = $_FILES["file_upload"]["error"];
		if($error===0){
			$nama_dagangan=$_POST["nama_dagangan"];
			$id=$_SESSION["rpl"];
			$harga=$_POST["harga"];
			$nama_folder="file_upload";
			$tmp =$_FILES["file_upload"]["tmp_name"];
			$nama_file=$_FILES["file_upload"]["name"];
			move_uploaded_file($tmp,"$nama_folder/$nama_file");
			
			include('konek.php');
			$nama_dagangan=mysqli_real_escape_string($conn,$nama_dagangan);
			$harga=mysqli_real_escape_string($conn,$harga);
			
			
			$query1="INSERT INTO dagangan (nama_dagangan,harga,foto_barang,id_fk,id_kedai) VALUES ('$nama_dagangan','$harga','$nama_file','$id','$id')";
			$hasil1=mysqli_query($conn,$query1);
			
			$query2="SELECT * FROM dagangan WHERE id_fk='$id'";
			$hasil2=mysqli_query($conn,$query2);
		}
		
		else if($error==4){
			include('konek.php');
			$id=$_SESSION["rpl"];
			$query2="SELECT * FROM dagangan WHERE id_fk='$id'";
			$hasil2=mysqli_query($conn,$query2);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <!-- memanggil bootstrap & css-->
	<title>dagangan | info pasar</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script>
			function update(nomorId){
				$('#id').val(nomorId);
				return false;
			}
		</script>
		<script>
			function hapus(oke){
				$('#ok').val(oke);
				return false;
			}
		</script>
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
.item li img{
	width:70px;
	height:70px;
}
.item ul, .item li{
	list-style:none;
}
.item li{
	float:left;
	border:2px solid black;
	background-color: rgba(52, 73, 94,0.75) ;
	padding:8px;
	margin:10px;
	border-radius:10px;
}
.item p{
	margin:0px;
	padding:5px;
	font-size:20px;
	font-family:calibri;
	color:white;
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
		        <li><a href="logout.php">Log out</a></li>
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
			<p><input type="text" class='form-control' name="nama_dagangan" placeholder="nama dagangan"></p>
			<p><input type="text" class='form-control' name="harga" placeholder="harga"></p>
			
			<input type="submit" style="width:100px" class='form-control' name="submit" value="save">
		</form>
        </div>
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
	<div class="item">
		<ul>
		<?php
			while($data=mysqli_fetch_assoc($hasil2)){
        	echo "<li><img src='file_upload/$data[foto_barang]'>";
			echo "<p>nama : $data[nama_dagangan]</p>";
	        echo "<p>harga  :Rp. $data[harga]/kg</p><\li>";
			}
		?>
		</ul>
		</div>
	
</body>
</html>