<?php
	if(isset($_POST["submit"])){
		$cari=$_POST["cari"];
		include('konek.php');
		$query="SELECT * FROM dagangan WHERE nama_dagangan like '%$cari%'";
		$hasil=mysqli_query($conn,$query);
	
	}
?>
<!DOCTYPE html>
<html>
	<title>Harga Diskon</title>
	<h2>Cari Harga Diskon Disini</h2>
<style>
body{
	background-image: url('pasar.jpg'); 
	background-size: 100%;
	background-repeat: no-repeat;

}
h2{
	margin-top: 25px;
    text-align: center;
    font-family: "Courier New", Times, serif;
    font-size: 30px;
    color: #0000FF;
}
input[type=submit] { /*kotak cari di bar*/
		text-align: center;
		width: 10%;
		background-color: #8A2BE2;
		color: white;
		padding: 10px 20px;
		border: none;
		margin: 10px 0;
		cursor: pointer;
	}
	input[type=search], select { /*kotak cari di bar*/
		width: 30%;
		padding: 10px 10px;
		margin: 8px;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}
	
</style>
	<body>
		<div align="center" class="cari">
				<form action="#" method="post">				
					<input type="search" name="cari" placeholder="Cek harga diskon"></input>	
					<input type="submit" name="submit" value="Search"></input>
				</form>
			</div>
			<div class="car">
			
			<?php
			while($data=mysqli_fetch_assoc($hasil)){
				echo "nama barang '$data[nama_dagangan]' dengan harga '$data[harga]'";
			}
		
			?>
			
			</div>
	</body>
</html>