<?php

		 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=participants.csv');  
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('First Name', 'Last Name', 'Event id', 'Event name', 'Date'));  
$servername = $_SERVER['HTTP_HOST'];
$username = "cloud";
$password = "marathon";
$dbname = "marathon";
$link = mysqli_connect($servername,$username,$password,$dbname);
$sql2 = "select USER.uname, USER.usurname,  MAPPING.eid, EVENT.ename, EVENT.date from USER,EVENT,MAPPING where MAPPING.uid = USER.uid and MAPPING.eid = EVENT.eid order by eid";
      $result = mysqli_query($link, $sql2);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  


?>
