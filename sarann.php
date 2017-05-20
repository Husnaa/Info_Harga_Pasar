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
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<style>
	body{
	font-family: Actor, sans-serif;
	margin: 0;
	padding: 0;
}

	#form_wrapper {
		width: 700px;
		height: 600px;
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
	</style>
</head>
<body>
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
		<!-- end of form-->
		
	</div>

	<!-- end of wrapper -->
</body>
</html>