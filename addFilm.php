 <?php
    $insert = false;
    $year_error = "";
    $name_error = "";
    $check_error = "";
    $des_error = "";
    $lan_error = "";

    if (isset($_POST['name'])) {

        // connection db

        require_once("connectdb.php");
        
        // Collect post variables

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = test_input($_POST['name']);
        $description = test_input($_POST['description']);
        $language = test_input($_POST['language']);
        $releaseyear = test_input($_POST['releaseyear']);
        $specialfeatures = test_input($_POST['specialfeatures']);

        // Validation


        if (empty($name)) {

            $name_error = "Please Insert your values";
        } elseif (!preg_match("/^[a-zA-Z']*$/", $name)) {
            $name_error = "Please Insert only alphabits and white spaces";
        } elseif (empty($description)) {

            $des_error = "Please Insert your values";
        } elseif (empty($language)) {

            $lan_error = "Please select the Language";
        } elseif (empty($releaseyear)) {


            $year_error = "Please Insert your values";
        } elseif (!ctype_digit($_POST['releaseyear']) || $_POST['releaseyear'] > 2021) {

            $year_error = "enter valid year range";
        } elseif (empty($specialfeatures)) {

            $check_error = "please check the box";
        } else {
            $sql = "INSERT INTO film (title, description, language_id, release_year, special_features)
        VALUES 
        ('$name', '$description', '$language' , '$releaseyear', '$specialfeatures')";
            // echo $sql;

            $result = $conn->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($conn));
            $insert = true;
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
                 <span class="error">
                     <?php echo $name_error; ?></span>
             </div>
             <div class="form-group">
                 <label id="name-label" for="description">Description</label>
                 <input type="text" name="description" id="description" class="form-control" placeholder="enter Movie description" />
                 <span class="error">
                     <?php echo $des_error; ?></span>
             </div>

             <div class="form-group">
                 <select id="language" name="language" class="form-control">

                     <option value="select Language">
                         -- Select Language_id --</option>
                     <option value="1">English</option>
                     <option value="2">italian</option>
                     <option value="3">japanese</option>
                     <option value="4">mandarian</option>
                     <option value="5">French</option>
                 </select>
                 <span class="error">
                     <?php echo $lan_error; ?></span>
             </div>

             <div class="form-group">
                 <label id="name-label" for="releasesyear">release_year (1990-2021)</label>
                 <input type="number" name="releaseyear" id="releaseear" class="form-control" placeholder="enter year" />
                 <span class="error">
                     <?php echo $year_error; ?></span>
             </div>

             <div class="form-group">



                 <span> Add Extra Features </span>

                 <label><input class="input-checkbox" type="checkbox" name="specialfeatures" id="specialfeatures" value="Trailers">Trailer</label>
                 <label><input class="input-checkbox" type="checkbox" name="specialfeatures" id="specialfeatures" value="Trailers">Deleted Scenes</label>
                 <label><input class="input-checkbox" type="checkbox" name="specialfeatures" id="specialfeatures" value="Trailers">Behind the Scenes</label>
                 <label><input class="input-checkbox" type="checkbox" name="specialfeatures" id="specialfeatures" value="Trailers">Commentaries</label>

             </div>
             <span class="error">
                 <?php echo $check_error; ?></span>
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