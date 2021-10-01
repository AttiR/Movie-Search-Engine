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

      <form action="action1.php" method="post">
        <input type="text" name="search" placeholder="enter movie name or some key" aria-label="Search"><br>
        <button style="margin: 10px auto 10px auto;" class="btn btn-outline-success" type="submit" name="submit" value="search">Search</button>
      </form>

    </div>



  </center>

</body>

</html>