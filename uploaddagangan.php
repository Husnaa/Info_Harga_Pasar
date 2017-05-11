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
			<p><input type="text" name="ket" placeholder="story your photo"></p>
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