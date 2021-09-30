
<?php

// connecting to the database

session_start();
require_once("connectdb.php");

//include 'connectdb.php';
//$search = $_POST["search"];
if (isset($_POST['submit'])) {
  $search = $conn->real_escape_string($_POST["search"]);


  $query = "SELECT * FROM film where title like '$search%' OR 
description LIKE '$search%'";
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
  ?>
  </table> 
 <?php

  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }

  $conn->close();
}
?>