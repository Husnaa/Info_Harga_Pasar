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
<?php
if(isset($_POST["edit"])){
	$idkrip=$_POST["id"];
	$id=$_SESSION["rpl"];
	$nama=$_POST["namad"];
	include ('konek.php');
	
	$query7="UPDATE dagangan set harga='$nama' WHERE id='$idkrip'";
    $hasil4=mysqli_query($conn,$query7);	
	$query2="SELECT * FROM dagangan WHERE id_fk='$id'";
	$hasil2=mysqli_query($conn,$query2);
}
?>

<?php
if(isset($_POST["hapus"])){
	$idkrip=$_POST["id"];
	$id=$_SESSION["rpl"];
	include ('konek.php');
	
	$query7="delete from dagangan WHERE id='$idkrip'";
    $hasil4=mysqli_query($conn,$query7);	
	$query2="SELECT * FROM dagangan WHERE id_fk='$id'";
	$hasil2=mysqli_query($conn,$query2);
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
	background-color:#f5f5f5;
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
	background-color:rgba(80, 120, 60,0.80);
	padding:8px;
	margin:10px;
	border-radius:4px;
}
.item p{
	margin:0px;
	padding:0px;
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
        	echo "<li><center><img src='file_upload/$data[foto_barang]'></center>";
			echo "<p>$data[nama_dagangan]</p>";
	        echo "<p>Rp. $data[harga]/kg</p>";
			echo "<p><a href='#' id='$data[id]' data-toggle='modal' data-target='#myModal3' onClick='update(this.id)'>Edit</a> | <a href='#' id='$data[id]' data-toggle='modal' data-target='#myModal4' onClick='hapus(this.id)'>Hapus</a></p></li>";
			}
		?>
		</ul>
		</div>
		
		<div class="modal fade" id="myModal3" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Update</h4>
					</div>
					<div class="modal-body">
						<form action="#" method="post">
							<input id="id" type="number" value="" name="id" readonly style="display:none"/>
							<input type="number" class="form-control" name="namad"  />
							<input type='submit' style="width:100px" class="form-control" value="update" name="edit">
						</form>
					</div>
		
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="modal fade" id="myModal4" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<form action="#" method="post">
							<input id="ok" type="number" value="" name="id" readonly style="display:none"/>
							<p> anda akan menghapus dagangan ini !</p>
							<input type='submit' class="form-control" style="width:100px" value="hapus" name="hapus">
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