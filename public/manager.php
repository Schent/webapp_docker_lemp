<html>

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
  <span class="w3-bar-item w3-right">Marathon Mania Application</span>
</div>
<br>


<div class="w3-main">

  <!-- Header -->
  <header class="w3-container w3-center" style="padding-top:22px">
    <h1><b><i class="fa fa-dashboard w3-"></i> Create Event</b></h1>
  </header>


<div class="w3-container" style="margin-left:300px;margin-right:300px;margin-top:43px;">


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$servername = $_SERVER['HTTP_HOST'];
$username = "cloud";
$password = "marathon";
$dbname = "marathon";
$in_ename = $_POST["input_name"]; 
$in_date = $_POST["input_date"];
if($in_ename && $in_date){
$link = mysqli_connect($servername,$username,$password,$dbname);
$sql = "INSERT INTO EVENT (ename,date) VALUES ('$in_ename','$in_date')";

mysqli_query($link, $sql);
}




$del = $_POST["del"];
if($del){
	$servername = $_SERVER['HTTP_HOST'];
$username = "cloud";
$password = "marathon";
$dbname = "marathon";
$link = mysqli_connect($servername,$username,$password,$dbname);
$s = "delete from EVENT where eid = '$del'";
$s2 = "delete from MAPPING where eid = '$del'";
$result = mysqli_query($link,$s);
$result = mysqli_query($link,$s2);
	
}
}
?>








<!-- create form -->
<form class="w3-container w3-card-4" action="/manager.php" method="post">
  <h4 class="w3-text-red"><center>!! Create Events !!</center></h4>
  <label class="w3-text-red"><b>Name of event</b></label>
  <input class="w3-input w3-border" name="input_name" type="text"></p>
  <p>      
  <label class="w3-text-red"><b>Date</b></label>
  <input class="w3-input w3-border" name="input_date" type="text"></p>
  <p>      
  <center><button class="w3-btn w3-red ">Enter</button></p></center>
</form>



<!-- delete -->
<form class="w3-container w3-card-4" action="/manager.php" method="post">
  <h4 class="w3-text-red"><center>!! Delete Events !!</center></h4>
  <center><select name="del"> 

	<option value="0" class="w3-text-blue"></option>
	<?php 
$servername = $_SERVER['HTTP_HOST'];
$username = "cloud";
$password = "marathon";
$dbname = "marathon";
$link = mysqli_connect($servername,$username,$password,$dbname);
$s = "select * from EVENT";
$result = mysqli_query($link,$s);
while($x = mysqli_fetch_assoc($result)){
	echo '
	<option value="'.$x["eid"].'" class="w3-text-blue">'.$x["ename"].'</option>
';
}

	?>
   </select>  </center>

  <center><button class="w3-btn w3-red ">Enter</button></p></center>
</form>









  <h1><span class="w3-bar-item"><center>Current Events</center></span></h1>

<!-- Show table -->
  <table class="w3-table-all">
  <thead>
      <tr class="w3-light-grey">
        <th><center>NAME</center></th>
        <th><center>DATE</center></th>
      </tr>
    </thead>

<?php 

$servername = $_SERVER['HTTP_HOST'];
$username = "cloud";
$password = "marathon";
$dbname = "marathon";

$link = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * FROM EVENT";
$result = mysqli_query($link,$sql);





while ($x = mysqli_fetch_assoc($result)){
	echo '
	<tr>
     <th><center>'.$x["ename"].'</center></th>
     <th><center>'.$x["date"].'</center></th>
</center>
    </tr>

	';
}
?>
  </table>
</div>
</div>
</body>
</html>
