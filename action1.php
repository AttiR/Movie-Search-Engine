<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/salika.css?<?php echo time(); ?>">

    <!-- Boostsrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Boostsrap JavaScript Bundle -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Movie Search App</title>

    <title>Movie Search Results</title>
</head>
<body>

<div class="container" id="movie-search">

<?php

// connecting to the database

session_start();
require_once("connectdb.php");

//include 'connectdb.php';
//$search = $_POST["search"];

if (isset($_POST['submit'])) {

    $search = $_POST['search'];
    
    // Pagination

    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page -1) * $limit;


    $query = "SELECT * FROM film where title like '$search%' OR 
    description LIKE '$search%' LIMIT $start, $limit";
     /*$query = " SELECT * FROM `film` AS f INNER JOIN film_category AS fc ON fc.film_id = f.film_id INNER JOIN category AS c ON c. category_id = fc.category_id WHERE name LIKE '$search_value%' OR 
    description LIKE '$search_value%' ";*/
    $result = mysqli_query($conn, $query);
    $no = 1;
 
  
    ?>
    <table class="table">
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

<div class="pagination">    
      <?php  
        $pr_query = "SELECT * FROM film where title like '$search%' OR 
        description LIKE '$search%'";     
        $pr_result = mysqli_query($conn, $pr_query);     
        $total_records = mysqli_num_rows($pr_result);    
        $total_pages = ceil($total_records/$limit);

        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='action1.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='action1.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='action1.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='action1s.php?page=".($page+1)."'>  Next </a>";   
        }   
  
    
      ?>    
      </div>  



</center>
  <?php

}  
?>
<?php
  $conn->close();
  ?>

    
</body>
</html>
