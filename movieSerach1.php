<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/salika.css">
  <!-- Boostsrap Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- Boostsrap JavaScript Bundle -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <title>Movie Search Engine</title>
</head>

<body>

  <h1>Simple search engine with PHP and MySQLi</h1>
  <form action="" method="post">
    <input type="text" name="search" placeholder="enter your search">
    <input type="submit" name="submit" value="Search">
  </form>

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

  $search_value = $_POST["search"];
    $query = " SELECT * FROM `film` AS f INNER JOIN film_category AS fc ON fc.film_id = f.film_id INNER JOIN category AS c ON c. category_id = fc.category_id WHERE name LIKE '$search_value%' OR 
    description LIKE '$search_value%' ";
    $result = mysqli_query($conn, $query);
    $no = 1;
    while ($row = mysqli_fetch_array($result)) {


      echo "<table><tr><td>" . $no . "</td><td>" . $row['title'] . "</td><td>" . $row['description'] . "</td><td>" . $row['rating'] . "</td><td>" . $row['release_year'] . "</td></tr>
      </table>";
      $no = $no + 1;
  }
  ?>


</body>

</html>