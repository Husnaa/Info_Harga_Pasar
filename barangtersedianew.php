<?php
	session_start();
	include('konek.php');
	$idi=$_GET["id"];
	$query2="SELECT * FROM dagangan WHERE id_fk='$idi'";
	$hasil2=mysqli_query($conn,$query2);
	
	$query3="SELECT nama,email,no_hp FROM user where id='$idi'";
	$hasil3=mysqli_query($conn,$query3);
	$berkas=mysqli_fetch_assoc($hasil3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>info pasar | nanma kedai</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <style>
  .item li img{
	width:200px;
	height:200px;
}
.item ul, .item li{
	list-style:none;
}
.item li {
	float:left;
	background-color: #555 ;
	padding:8px;
	margin:10px;
	border-radius:10px;
	
}
	

.item p{
	margin:0px;
	padding:0px;
	font-size:20px;
	font-family:calibri;
	color:white;
}
.item i{
	display:none;
}
.item span{
	color:white;
	float:right;
	padding:4px;
	background-color:rgba(74, 145, 240,1);
	border-radius:10px;
}
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
	.item{
		height:550px;
		overflow-x:hidden;
		overflow-y:scrool;
	}
	
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
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
        <li><a href="#">Harga grosir</a></li>
        <li><a href="hargadiskon.php">Harga diskon</a></li>
		<li><a href="saran.php">Kritik dan saran</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="jura/hargamurah.php">Cek harga murah</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><img style="width:150px;height:200px" src="profil.gif"></p>
      <p style="font-size:16px"><b><?php echo"$berkas[nama]"; ?></b></p>
      <p style="font-size:16px"><b><?php echo"$berkas[email]"; ?></b></p>
	  <p style="font-size:16px"><b><?php echo"$berkas[no_hp]"; ?></b></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <div class="item">
		<ul>
		<?php
			while($data=mysqli_fetch_assoc($hasil2)){
        	echo "<li><center><img src='file_upload/$data[foto_barang]'></center>";
			echo "<p>$data[nama_dagangan]</p>";
	        echo "<p>Rp. $data[harga]$data[satuan]</p>";
			echo "<p>Diskon: $data[diskon]</p></li>";
			
			}
		?>
		</ul>
		</div>
    </div>
    <div class="col-sm-2 sidenav">
        <p style="margin-bottom:20px"><img style="width:200px" src="iklan2.gif"></p>
		
		<p><img style="width:200px" src="iklan.png"></p>
    </div>
  </div>
</div>

<footer style="background-color:black" class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
