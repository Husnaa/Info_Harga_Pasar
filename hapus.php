<?php
	session_start();
	include('konek.php');
	$id=$_SESSION["rpl"];
	$query2="SELECT * FROM dagangan WHERE id_fk='$id'";
	$hasil2=mysqli_query($conn,$query2);
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
	<title></title>
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
</head>
<body>

				<div class="modal-body">
						<form action="#" method="post">
							<input id="ok" type="number" value="" name="id" readonly style="display:none"/>
							<p> anda akan menghapus dagangan ini !</p>
							<input type='submit' class="form-control" style="width:100px" value="hapus" name="hapus">
						</form>
				</div>

</body>
</html>