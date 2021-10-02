<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/sakila.css?<?php echo time(); ?>">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

 



</head>

<body>

  <center>

    <header class="header">
      <h1 id="title" class="text-center">Find your Favourite Movie</h1>
      <p id="description" class="description text-center">
        Thank you for using the App, Search your Favourite Movie!
      </p>
    </header>
    <div class="container" id="movie-search">

       <!-- Nav Bar  -->

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"> Movie Search Bar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a class="nav-link" href="addFilm.php">Add Movie</a>
         </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Movie Category
            </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
          </li>
        
        </ul>
          <form class="form-inline my-2 my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="movie search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" vaöue search>Search</button>
          </form>
      </div>
    </nav> 
      

      <?php

      // connecting to the database

      session_start();
      require_once("connectdb.php");

      //include 'connectdb.php';
      //$search = $_POST["search"];

      if (isset($_POST['submit'])) {

      $search = $_POST['search'];

      // Pagination

      $limit = 20;
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $start = ($page -1) * $limit;


      $query = "SELECT * FROM film where title like '$search%' OR 
      description LIKE '$search%' LIMIT $start, $limit";
      /*$query = " SELECT * FROM `film` AS f INNER JOIN film_category AS fc ON fc.film_id = f.film_id INNER JOIN category AS c ON c. category_id = fc.category_id WHERE name LIKE '$search_value%' OR 
      description LIKE '$search_value%' ";*/
      $result = mysqli_query($conn, $query);
      $no = 1;


      ?>
      <div class="table-responsive">

         <table id="table" class="table table-bordered table-striped table-hover">
            <tr>
              <th>Sr.No.</th>
              <th>Title</th>
              <th>Description</th>
              <th>Rating</th>
              <th>release_year</th>

            </tr>

          <?php  

          while ($row = mysqli_fetch_array($result)) {

          ?>


            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['rating']; ?></td>
              <td><?php echo $row['release_year']; ?></td>

            </tr>
        <?php
        $no = $no + 1;
        }
        ?>
        </table> 

      </div>

      <?php

      }  
      ?>
      <?php
      $conn->close();
      ?>

    </div>

  </center>
  <script type="text/javascript">

$(document).ready(function() {
    $('#table').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );

  </script>


</body>

</html>