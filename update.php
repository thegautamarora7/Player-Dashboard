<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
 <a href="insert.php">Insert New Record</a> 
  <a href="delete.php">Delete the Record</a>
 <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>

<a href='view.php'>View Updated Record</a> <!-- Link to view the updated record -->
<p style="color:#FF0000;"></p> <!-- Placeholder for error messages -->
<div>
<form name="form" method="post" action=""> 
<input name="playerId" type="text" placeholder="Enter the Id:" required/> <!-- Input field for entering the player ID -->
<input name="submit" type="submit"> <!-- Submit button to submit the player ID -->
</form>
</div>
</div>
</body>
</html>

<?php

require_once 'dbconfigure.php'; // Include the database configuration file

// Check if the playerId has been submitted
if (isset($_POST['playerId'])) {
    $enteredID = $_POST['playerId']; // Store the entered player ID
    // SQL query to select the player record with the given ID
    $sqlSelect = "SELECT * FROM players where playerId='$enteredID'";
    $queryRes = mysqli_query($connectionObject, $sqlSelect); // Execute the select query
    $row = mysqli_fetch_array($queryRes); // Fetch the result as an associative array
    
    // Check if the query was successful
    if ($queryRes) {
        // Retrieve values from the fetched row
        $fetchedName = $row["playerName"];
        $fetchedAge = $row["playerAge"];
        $fetchedGender = $row["Gender"];
        $fetchedInterest = $row["sportsName"];
        $fetchedcomplevel = $row["competitionLevel"];
        // Display the form with fetched values for updating
        echo "<form method = 'post' action =''>
        playerId <input type = 'text' name ='playerId' value = $enteredID readonly> <!-- Display player ID as read-only -->
        playerName <input type = 'text' name ='playerName' value = $fetchedName> <!-- Input field for player's name -->
        playerAge <input type = 'text' name ='playerAge' value = $fetchedAge> <!-- Input field for player's age -->
        Gender <input type = 'text' name ='Gender' value = $fetchedGender> <!-- Input field for player's gender -->
        sportsName <input type = 'text' name ='sportsName' value = $fetchedInterest> <!-- Input field for sports interests -->
        competitionLevel <input type = 'text' name ='competitionLevel' value = $fetchedcomplevel> <!-- Input field for competition level -->
        <input type ='Submit' value='Update' name = 'update'> <!-- Submit button for updating the record -->
        </form>
        ";
    }

    // Check if the update form has been submitted
    if(isset($_POST["update"])) {
        // Retrieve updated values from the form
        $id = $_POST["playerId"]; // Store the player ID
        $updatedName = $_POST["playerName"]; // Store the updated player name
        $updatedAge = $_POST["playerAge"]; // Store the updated player age
        $updatedGender = $_POST["Gender"]; // Store the updated player gender
        $updatedInterest = $_POST["sportsName"]; // Store the updated sports interests
        $updatedcomplevel = $_POST["competitionLevel"]; // Store the updated competition level

        // SQL query to update the player record with the new values
        $updateQuery = "UPDATE players SET playerName='$updatedName', playerAge='$updatedAge', Gender='$updatedGender', sportsName = '$updatedInterest', competitionLevel = '$updatedcomplevel' WHERE playerID ='$id' ";
        $queryResult = mysqli_query($connectionObject, $updateQuery); // Execute the update query
        // Check if the update was successful
        if($queryResult==true) {
            echo "Record Updated"; // Message indicating the record was successfully updated
        }
        else {
            echo "Error Occcured"; // Message indicating an error occurred during the update
        }
    }
}

?>
