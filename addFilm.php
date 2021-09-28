<?php
$insert = false;
$error_name = "";
if (isset($_POST['name'])) {
  // Set connection variables
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "sakila";

  // Create a database connection
  $conn = mysqli_connect($server, $username, $password, $database);

  // Check for connection success

  if (!$conn) {
    die("connection to this database failed due to" . mysqli_connect_error());
  }

  //echo "Success connecting to the db";
  //echo "name is:" .$_POST['name']. '<br>';
  //echo "description is:" .$_POST['description']. '<br>';
  // Collect post variables

  $name = $_POST['name'];
  $description = $_POST['description'];
  $language = $_POST['language'];
  $releaseyear = $_POST['releaseyear'];
  $specialfeatures = $_POST['specialfeatures'];

  $error_name = " ";
  if (empty($name) || empty($description)  || empty($language) || empty($releaseyear) || empty($specialfeatures)) {

    $error_name = "Please Insert your values";
  } else {

    $sql = "INSERT INTO film (title, description, language_id, release_year, special_features)
   VALUES 
  ('$name', '$description', '$language' , '$releaseyear', '$specialfeatures')";
    // echo $sql;

    $result = $conn->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($conn));
    $insert = true;

    // Execute the query
    /*if ($conn->query($sql) == true) {
    echo "Successfully inserted";

    Flag for successful insertion
    $insert = true;
  } else {
    echo "ERROR: $sql <br> $conn->error";
  }*/
  }




  // Close the database connection
  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/form.css?<?php echo time(); ?>">
  <title>Add Film to Movie database</title>
</head>

<body>

  <div class="container">

    <header class="header">
      <h1 id="title" class="text-center">Add your Favuorite Movie to DataBase</h1>



      <?php
      if ($insert == true) {
        echo "<p class='submitMsg'>Thanks for Adding Movie Information. We Love it!</p>";
      }
      ?>
      </p>
    </header>
    <form action="addFilm.php" id="add-film" method="post">

      <div class="form-group">
        <label id="name-label" for="name">Title</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="enter Movie title" />
        <span class="error"> <?php echo $error_name; ?></span>
      </div>
      <div class="form-group">
        <label id="name-label" for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="enter Movie description" />
        <span class="error"> <?php echo $error_name; ?></span>
      </div>

      <div class="form-group">
        <select id="language" name="language" class="form-control">

          <option value="select Language"> -- Select Language_id --</option>
          <option value="1">English</option>
          <option value="2">italian</option>
          <option value="3">japanese</option>
          <option value="4">mandarian</option>
          <option value="5">French</option>
        </select>
        <span class="error"> <?php echo $error_name; ?></span>
      </div>

      <div class="form-group">
        <label id="name-label" for="releasesyear">release_year</label>
        <input type="number" name="releaseyear" id="releaseear" class="form-control" min="1950" max="2021" placeholder="enter year" />
        <span class="error"> <?php echo $error_name; ?></span>
      </div>





      <div class="form-group">

        <legend>Enter the special features</legend>
        <input type="checkbox" name="specialfeatures" id="specialfeatures" value="Trailers">Trailers<br>
        <input type="checkbox" name="specialfeatures" id="specialfeatures" value="Deleted Scenes">Deleted Scenes<br>
        <input type="checkbox" name="specialfeatures" id="specialfeatures" value="Behind the Scenes">Behind the Scenes<br>
        <input type="checkbox" name="specialfeatures" id="specialfeatures" value="Commentaries">Commentaries<br>


      </div>
      <span class="error"> <?php echo $error_name; ?></span>
      <div class="form-group">
        <button type="submit" name="submit " id="submit" value="submit" class="submit-button">
          Submit
        </button>
      </div>

    </form>

  </div>

  </div>

</body>

</html>