<?php
session_start();

	include('konek.php');
	$query="SELECT * FROM kedai"; 
	$hasil=mysqli_query($conn,$query);

?>	
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
		$(document).ready(function(){
			$(".item a").click(function(){
				var ha = $(this).children().text();
				showHint(ha);
				return false;
			});
		});
		
		function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("wah").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "barangtersedia.php?q=" + str, true);
        xmlhttp.send();
    }
}
	</script>
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
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body id="wah">

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
        <li><a href="#">harga grosir</a></li>
        <li><a href="#">harga diskon</a></li>
		<li><a href="saran.php">kritik dan saran</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="hargamurah.php"><span class="glyphicon glyphicon-log-in"></span> Cek harga termurah</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img style="height:500px" src="bg3.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Murah Meriah</h3>
        </div>      
      </div>

      <div class="item ">
        <img style="height:500px" src="gambar3.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Belanja jadi lebih mudah</h3>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">    
  <h3>Pilih Kedai Langganan Anda</h3><br>
  <div class="item">
		<ul>
		<?php
			while($data=mysqli_fetch_assoc($hasil)){
        	echo "<li><img src='kedai.png'>";
			echo "<p style='display:none'>no $data[no_kedai]</p>";
	        echo "<p>$data[nama_kedai]</p>";
			echo "<p>menjual $data[jenis_kedai]</p>";
			echo "<p>$data[alamat]</p>";
			echo "<p><a href='barangtersedia.php'><span><i>$data[no_kedai]</i>Buka</span></a></p></li>";
			}
		?>
		</ul>
		</div>
</div><br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
