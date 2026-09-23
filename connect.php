<?php
function OpenCon()
 {
 $dbhost = "";
 $dbuser = "u815269667_abhi";
 $dbpass = "SpiffyS0924";
 $db = "u815269667_spiffysoft";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

   
?>