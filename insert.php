<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="form">
   <a href="dashboard.php">Dashboard</a> 
  <a href="insert.php">Insert New Record</a>
  <a href="view.php">View Records</a>
  <a href="update.php">Update Records</a>
  <a href="delete.php">Delete Records</a>
  <a href="logout.php">Logout</a>
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" /> <!-- Hidden field to indicate this is a new record submission -->
<p><input type="text" name="name" placeholder="Enter Name" required /></p> <!-- Input field for player's name -->
<p><input type="text" name="age" placeholder="Enter Age" required /></p> <!-- Input field for player's age -->
<p><input type="text" name="gender" placeholder="Enter Gender" required /></p> <!-- Input field for player's gender -->
<p><input type="text" name="interest" placeholder="Enter Sports Interested" required /></p> <!-- Input field for sports interests -->
<p><input type="text" name="complevel" placeholder="Enter Competition Level" required /></p> <!-- Input field for competition level -->
<p><input name="submit" type="submit" value="Submit" /></p> <!-- Submit button to send the form data -->
</form>
<p style="color:#FF0000;"></p> <!-- Placeholder for error messages -->
</div>
</div>
</body>
</html>


<?php

require_once 'dbconfigure.php'; // Include the database configuration file for database connection

// Retrieve form data from POST request
$playerName = $_POST['name']; // Get the player's name
$playerAge = $_POST['age']; // Get the player's age
$playerGender = $_POST['gender']; // Get the player's gender
$playerInterest = $_POST['interest']; // Get the player's sports interests
$playercompLevel = $_POST['complevel']; // Get the player's competition level

// SQL query to insert a new player record into the database
$insertSt = "insert into players(playerName, playerAge, Gender, sportsName, competitionLevel) values('$playerName','$playerAge','$playerGender', '$playerInterest', '$playercompLevel' )";

// Execute the insert query
$Result = mysqli_query($connectionObject,$insertSt);
if ($Result){
    echo "Record Saved"; // Message indicating the record was successfully saved
}
else{
    echo "Error please try again!"; // Message indicating an error occurred during insertion
}
