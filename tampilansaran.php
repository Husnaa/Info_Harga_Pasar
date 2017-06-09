<?php
if(isset($_POST['sub'])){
	include('konek.php');
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$komentar=$_POST['komentar'];
	
	$query="insert into saran values ('$nama','$email','$komentar')";
	$hasil=mysqli_query($conn,$query);
}
?>

<?php
	include('konek.php');
	$query1="select * from saran";
	$hasil1=mysqli_query($conn,$query1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	body{
	font-family: Actor, sans-serif;
	margin: 0;
	padding: 0;
}

	#form_wrapper {
		width: 700px;
		height: auto;
		margin: 0 auto;
		font-size: 20px;
		color: #666;
	}

	h2 {
		font-size: 35px;
		color: #8B008B;
	}

	.header div{
		font-size: 35px;
		color: #8B008B;
	}

.field input{
	width: 200px;
	padding: 10px;
	color: #666;
	font-size: 15px;
}

textarea{
	font-size: 18px;
	color: #666px;
	width: 300px;
	max-width: 300px;
	height: 100px;
	max-height: 200px;
}

.sub input{
	width: 80px;
	height: 30px;
	background-color: #8B008B;
	text-align: center;
	color: #fff;
	font-weight: bold;
}

label {
	margin-left: 30px;
}

.kotak{
	width: 800px;
	margin:0 auto;
	border: solid 1px grey;
	word-wrap: break-word;
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
        <li><a href="jura/grosir.php">harga grosir</a></li>
        <li><a href="hargadiskon.php">harga diskon</a></li>
		<li><a href="saran.php">kritik dan saran</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="jura/hargamurah.php"> Cek harga termurah</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div id="form_wrapper">

		<h2>Kritik dan Saran</h2>
		
		<form action="#" method="post" class="form">

			<p class="field">
				<input type="text" name="nama"placeholder="Nama">	
				
			</p>


			<p class="field">
				<input type="text" name="email"placeholder="Email">	
				
			</p>


			<p class="komentar">
				<textarea name="komentar" placeholder="Kritik dan Saran"></textarea>
			</p>

			

			<p class="sub">
				<input type="submit" name="sub" value="Send">
			</p>
		</form>
	</div>
	
	<div class='kotak'>
		<p>
				<?php
					while($data = mysqli_fetch_assoc($hasil1)){
					echo "<h3>$data[nama]</h3>";
					echo "<h4>$data[komentar]</h4>";
					echo "<hr>";
				}
				?>
		</p>
	</div>
</body>
</html>