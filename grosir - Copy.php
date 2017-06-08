<?php
	session_start();
	include('konek.php');
	$query2="SELECT * FROM grosir";
	$hasil2=mysqli_query($conn,$query2);
?>
<?php
	
	if (isset($_POST["submit"])) {
		$error = $_FILES["file_upload"]["error"];
		if($error===0){
			$nama_dagangan=$_POST["nama_dagangan"];
			$harga=$_POST["harga"];
			$satuan=$_POST["satuan"];
			$nama_folder="file_upload";
			$tmp =$_FILES["file_upload"]["tmp_name"];
			$nama_file=$_FILES["file_upload"]["name"];
			move_uploaded_file($tmp,"$nama_folder/$nama_file");
			
			include('konek.php');
			$nama_dagangan=mysqli_real_escape_string($conn,$nama_dagangan);
			$harga=mysqli_real_escape_string($conn,$harga);
			
			
			$query1="INSERT INTO grosir (nama_dagangan,harga,satuan,foto_barang) VALUES ('$nama_dagangan','$harga','$satuan','$nama_file')";
			$hasil1=mysqli_query($conn,$query1);
			
			$query2="SELECT * FROM grosir";
			$hasil2=mysqli_query($conn,$query2);
		}
		
		else if($error==4){
			include('konek.php');
			$query2="SELECT * FROM grosir";
			$hasil2=mysqli_query($conn,$query2);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>

  <!-- memanggil bootstrap & css-->
	<title>grosir | info pasar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
	background-image:url(passar.jpg);
	background-color:#f5f5f5;
	background-repeat: no-repeat;
	background-size: cover;
	background-size: 100% 720px;
}

.item li img{
	width:100px;
	height:100px;
}
.item ul, .item li{
	list-style:none;
}
.item li{
	float:left;
	background-color:rgba(255,255,255,0.80);
	padding:25px;
	margin:10px;
	border-radius:4px;
}
.item p{
	margin:0px;
	padding:0px;
	font-size:20px;
	font-family:calibri;
	color:black;
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
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="welcome.php">Home</a></li>
        <li><a href="buatlapak2new.php">Kedai</a></li>
        <li><a href="grosir.php">harga grosir</a></li>
        <li><a href="hargadiskon.php">harga diskon</a></li>
		<li><a href="saran.php">kritik dan saran</a></li>
		<li><a href="peta.php">Peta</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="jura/hargamurah.php"> Cek harga termurah</a></li>
      </ul>
    </div>
  </div>
</nav>


	<div class="item">
		<ul>
		<?php
			while($data=mysqli_fetch_assoc($hasil2)){
        	echo "<li><center><img src='file_upload/$data[foto_barang]'></center>";
			echo "<p>$data[nama_dagangan]</p>";
	        echo "<p>Rp. $data[harga]$data[satuan]</p>";}
		?>
		</ul>
		</div>
		
		
					
		
</body>
</html>