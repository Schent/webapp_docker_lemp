<title>MARATHON MANIA</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;Menu</button>
  <span class="w3-bar-item w3-right"><a href="/" style="text-decoration: none">Marathon Mania Application</a></span>
</div>
<br>


<div class="w3-main">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h1><b><i class="fa fa-dashboard"></i> Marathon Program IN 2017</b></h1>
  </header>


<?php
#GET data from SQL -->
$servername = $_SERVER['HTTP_HOST'];
$username = "root";
$password = "admin";
$dbname = "marathon";

$link = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM EVENT order by date";
$result = mysqli_query($link,$sql);

$colors = ['black','white','green','yellow','gray','orange'];


while ($x = mysqli_fetch_assoc($result)){
	if($i == 0){
		$i = 1;
	} 
	else $i = 0;
	echo '
	<a href = "/participant.php">	
	    <div class="w3-quarter">
	      <div class="w3-container w3-'. $colors[$i] .' w3-padding-16">
		<div class="w3-center">
		  <h2>'.$x["ename"].'<h2>
		  <h4>'.$x["date"].'</h4>
		</div>
	      </div>
	   </div>
	</a>
	';
}
?>
</div>

</body>
</html>
