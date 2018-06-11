<?php


$conn = mysqli_connect("127.0.0.1","root","","") or die ("Unable to connect to Localhost");
mysqli_select_db($conn, "myweb") or die ("Could not select the database.");


?>