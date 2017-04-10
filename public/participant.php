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
  <span class="w3-bar-item w3-right"><a href="/" style="text-decoration: none">Marathon Mania Application</a></span>
</div>
<br>


<div class="w3-main">

  <!-- Header -->
  <header class="w3-container w3-center" style="padding-top:22px">
    <h1><b><i class="fa fa-dashboard w3-"></i> Event Name</b></h1>
  </header>


<div class="w3-container" style="margin-left:300px;margin-right:300px;margin-top:43px;">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$servername = $_SERVER['HTTP_HOST'];
$username = "root";
$password = "admin";
$dbname = "marathon";
$in_name = $_POST["first"]; 
$in_surname = $_POST["last"];
$in_event = $_POST["in_event"];
$link = mysqli_connect($servername,$username,$password,$dbname);
$sql = "INSERT INTO USER (uname,usurname) VALUES ('$in_name','$in_surname')";
mysqli_query($link,$sql);
$s3 = "select uid from USER where uname = '$in_name' and usurname = '$in_surname'";
$guid = mysqli_query($link,$s3);
$r = mysqli_fetch_object($guid);
$sql2 = "insert into MAPPING (uid,eid) VALUES ('$r->uid','$in_event')";
mysqli_query($link, $sql2);
	
}
?>



<!-- register form -->
<form class="w3-container w3-card-4" action="/participant.php" method="post">
  <h4 class="w3-text-blue"><center>!! Register Now !!</center></h4>
  <label class="w3-text-blue"><b>First Name</b></label>
  <input class="w3-input w3-border" name="first" type="text"></p>
  <p>      
  <label class="w3-text-blue"><b>Last Name</b></label>
  <input class="w3-input w3-border" name="last" type="text"></p>
  <p>

  <select size = "1" name ="in_event" width: 5.5em> 
<?php
$servername = $_SERVER['HTTP_HOST'];
$username = "root";
$password = "admin";
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

  </select>

  <center><button class="w3-btn w3-blue ">Enter</button></p></center>
  </form>



  <h1><span class="w3-bar-item"><center>Participants</center></span></h1>
  <h4><span class="w3-bar-item"><center><a href="/function.php">Download as CSV</a></center></span></h4>


<!-- Show table -->
  <table class="w3-table-all">
  <thead>
      <tr class="w3-light-grey">
        <th><center>NAME</center></th>
        <th><center>SURNAME</center></th>
        <th><center>EVENT</center></th>
      </tr>
    </thead>

<?php 

$servername = $_SERVER['HTTP_HOST'];
$username = "root";
$password = "admin";
$dbname = "marathon";
$link = mysqli_connect($servername,$username,$password,$dbname);
$sql2 = "select USER.uname, USER.usurname,  MAPPING.eid, EVENT.ename from USER,EVENT,MAPPING where MAPPING.uid = USER.uid and MAPPING.eid = EVENT.eid order by eid";
$mapping = mysqli_query($link,$sql2);

while ($x = mysqli_fetch_assoc($mapping)){
	echo '
	<tr>
     <th><center>'.$x["uname"].'</center></th>
     <th><center>'.$x["usurname"].'</center></th>
     <th><center>'.$x["ename"].'</center></th>
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
