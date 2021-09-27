<?php
// connecting to the database

$servername = "localhost";
$username = "root";
$password = "";
$database = "sakila";

//Create a connection

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {

  die("oops we failed to connect: " . mysqli_connect_error());
} else {
  echo "connection is created<br>";
}
