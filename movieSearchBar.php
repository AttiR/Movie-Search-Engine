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
  <title>Movie Search App</title>


</head>

<body>

  <center>

    <header class="header">
      <h1 id="title" class="text-center">Find your Favourite Movie</h1>
      <p id="description" class="description text-center">
        Thank you for suing App, Search your Favourite Movie!
      </p>
    </header>

    <form action="" method="post">
      <input type="text" name="search" placeholder="enter movie name or some key" aria-label="Search"><br>
      <button style="margin: 10px auto 10px auto;" class="btn btn-outline-success" type="submit" name="submit" value="search">Search</button>
    </form>

    <table>
      <tr>
        <th>Sr.No.</th>
        <th>Title</th>
        <th>Description</th>
        <th>Rating</th>
        <th>release_year</th>

      </tr>

      <?php

      // connecting to the database

      include 'connectdb.php';
      $search = $_POST["search"];
      $query = "SELECT * FROM film where title like '$search%' OR 
      description LIKE '$search%'";
      /*$query = " SELECT * FROM `film` AS f INNER JOIN film_category AS fc ON fc.film_id = f.film_id INNER JOIN category AS c ON c. category_id = fc.category_id WHERE name LIKE '$search_value%' OR 
      description LIKE '$search_value%' ";*/
      $result = mysqli_query($conn, $query);
      $no = 1;


      while ($data = mysqli_fetch_array($result)) {

      ?>


        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $data['title']; ?></td>
          <td><?php echo $data['description']; ?></td>
          <td><?php echo $data['rating']; ?></td>
          <td><?php echo $data['release_year']; ?></td>

        </tr>
      <?php
        $no = $no + 1;
      }

      $conn->close();
      ?>
    </table>

  </center>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>