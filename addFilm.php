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

      <p id="description" class="description text-center">

        <!-- <?php
              if ($insert == true) {
                echo "<p class='submitMsg'>Thanks for submitting your Feedback. We valued your opinion!</p>";
              }
              ?>-->
      </p>
    </header>
    <form action="addFilm.php" id="add-film" method="post">

      <div class="form-group">
        <label id="name-label" for="name">Title</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="enter Movie title" required />
      </div>
      <div class="form-group">
        <label id="name-label" for="name">Description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="enter Movie description" required />
      </div>
      <div class="form-group">
        <label id="name-label" for="name">release_year</label>
        <input type="number" name="release_year" id="release_year" class="form-control" placeholder="enter year" required />
      </div>

      <div class="form-group">
        <select id="language" name="language" class="form-control" required>

          <option value="select Language"> -- Select Language_id --</option>
          <option value="1">English</option>
          <option value="2">italian</option>
          <option value="3">japanese</option>
          <option value="4">mandarian</option>
          <option value="5">French</option>
        </select>

        <div class="form-group">
          <label id="name-label" for="name">Rental Period</label>
          <input type="number" name="rental_period" id="rental_period" class="form-control" enter Rental period="enter number" required />
        </div>

        <div class="form-group">
          <label id="name-label" for="name">Rental Price</label>
          <input type="number" name="rental_price " id="rental_price" class=" form-control" enter Rental price="enter price" required />
        </div>

        <div class="form-group">
          <label id="name-label" for="name">Length</label>
          <input type="number" name="length " id="rental_price" class=" form-control" enter length="enter number" required />
        </div>

        <div class="form-group">
          <label id="name-label" for="name">Replacement cost</label>
          <input type="number" name="replacement_cost " id="replacement_cost" class=" form-control" enter replacement cost="enter number" required />
        </div>
      </div>

      <div class="form-group">
        <label id="name-label" for="name">Age limit</label>
        <input type="number" name="age " id="age" class=" form-control" enter Rental price="enter number" required />
      </div>

      <div class="form-group">

        <p>Enter Speacial Featiures</p>
        <label class="lable"> Trailers
          <input type="checkbox" checked="cheked">
          <span class="checkmark"></span>
        </label>
        <label class="label"> Deleted scenes
          <input type="checkbox" checked="cheked">
          <span class="checkmark"></span>
        </label>
        <label class="label"> Commentaries
          <input type="checkbox" checked="cheked">
          <span class="checkmark"></span>
        </label>
        <label class="label"> Behind the scenes
          <input type="checkbox" checked="cheked">
          <span class="checkmark"></span>
        </label>


      </div>
      <div class="form-group">
        <button type="submit" id="submit" class="submit-button">
          Submit
        </button>
      </div>

    </form>

  </div>

  </div>

</body>

</html>