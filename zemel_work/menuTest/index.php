<?php

// Connect to db
$connection = mysqli_connect("localhost","root","shamW0W!","zemel_test_db");

if(!$connection) {
  echo("Error connecting: " . mysqli_connect_error($connection));
}


// Insert data
if(isset($_POST["name"])) {
  $name = $_POST["name"];
  $insertDataQuery = "INSERT INTO zemel_test_table (name, cost, spiciness, other)
    VALUES ('" . $name . "', 100, 'Wicked hot', 'No notes')";
  if(!mysqli_query($connection, $insertDataQuery)) {
    echo("Error inserting data: " . mysqli_error($connection));
  }
}

// Get and display results
$fetchDataQuery = "SELECT name, cost, spiciness, other FROM zemel_test_table";
$fetchResult = mysqli_query($connection, $fetchDataQuery);

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Restaurant Menu Creator</title>
  </head>
  <body>

    Current dishes:
    <ul>
      <?php // Insert data

      if (!$fetchResult) {
        echo("Error fetching data: " . mysqli_error($connection));
      } else {
        while ($row = mysqli_fetch_assoc($fetchResult)) {
          echo("<li>Name: " . $row["name"] . "</li>");
        }
      }
       ?>
     </ul>

    <p>Add a new dish:</p>

    <form action="index.php" method="post">
      Dish name: <input type="text" name="name" value="">
      <br>
      Cost ($): <input type="text" name="cost" value="">
      <br>
      Spiciness: <input type="text" name="spiciness" value="">
      <br>
      Other info (optional): <input type="text" name="other" value="">
      <br>
      <input type="submit" value="Submit!">
    </form>

    <p>Here are our current dishes:</p>
  </body>
</html>

<?php
// Close connection
mysqli_close($connection);
 ?>
