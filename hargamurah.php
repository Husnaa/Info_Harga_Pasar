<?php
if(isset($_POST["submit"])){
	$oke="";
	if($oke==""){
	$cari=$_POST["cari"];
	include('konek.php');
	$query="SELECT a.nama_kedai,b.harga,b.nama_dagangan FROM dagangan b join kedai a on b.id_fk=a.no_kedai where b.nama_dagangan='$cari' ORDER BY b.harga ASC";
	$hasil=mysqli_query($conn,$query);
	}
}else{
	$cari="";
	$oke="";
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- memanggil bootstrap & css-->
	<title>cekharga|infopasar</title>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<style>
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
body {
	margin:0px;
	padding:0px;
	background-image:url('pasar.jpg');
}
.head{
	height:50px;
	background-color:#555;
}

.container{
	padding:70px;
}

.container h3{
	color: white;
	font-size: 40px;
	font-family: "bebas neue"
}


h3{
	margin:0px;
	padding:8px;
	color:white;
	font-family:calibri;
	float:right;
}
input[type=text] {
    width: 220px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input[type=text]:focus {
    width: 50%;
		</style>
</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="welcome.php">Beranda</a></li>
      <li><a href="login2.php">Penjual</a></li>
      <li><a href="buatlapak2.php">Pelanggan</a></li>
      <li><a href="grosir.php">Harga grosir</a></li>
      <li><a href="daftarDiskon.php">Harga Diskon</a></li>
      <li><a href="saran.php">Kritik dan Saran</a></li>
    </ul>
    <li class="active"><a href="hargamurah.php"> <button class="btn btn-danger navbar-btn" >Cari Harga Termurah</button></a>
  </div></li>
</nav>

	<!-- 	<header class="head">
		</header>
 -->

		<div class="container">
		<center>
			<form action="#" method="post">
				 <input type="text" name="cari"  placeholder="Cari Nama Barang">
				 <input type="submit" class="btn btn-danger" name="submit" value="CEK">
			</form>
			<br>
			<table style="background-color:#f5f5f5" class="table table-bordered">

    <thead>
      <tr class="danger">
        <th>NAMA BARANG</th>
        <th>HARGA</th>
        <th>NAMA KEDAI</th>
      </tr>
    </thead>
	<?php
	if($oke==""){
	while($data=mysqli_fetch_assoc($hasil)){
    echo"<tbody>";
      echo"<tr>";
       echo"<td>$data[nama_dagangan]</td>";
        echo"<td>Rp.$data[harga]/kg</td>";
        echo"<td>$data[nama_kedai]</td>";
      echo"</tr>";
     
    echo"</tbody>";
	}
	}
	?>
  </table>
		</center>	
		</div>
</body>
</html>