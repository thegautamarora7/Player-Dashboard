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
<p>
    <a href="dashboard.php">Dashboard</a> 
    <a href="insert.php">Insert New Record</a>
    <a href="update.php">Update the Record</a>  
    <a href="logout.php">Logout</a>
</p>
<h1>Delete Record</h1>

<p style="color:#FF0000;"></p> <!-- Placeholder for error messages -->
<div>
    <!-- Form for deleting a record -->
    <form name="form" method="post" action=""> 
        <input type="hidden" name="new" value="1" /> <!-- Hidden input to indicate form submission -->
        <input name="id" type="text" placeholder="Enter the Id" required/> <!-- Input field for user to enter the ID of the record to delete -->
        <input name="submit" type="submit" value="Delete" /> <!-- Submit button to send the delete request -->
    </form>
</div>
</div>
</body>
</html>

<?php
// Include database configuration file
require_once 'dbconfigure.php';

// Check if the form has been submitted and an ID has been provided
if (isset($_POST['id'])) {
    $enteredID = $_POST['id']; // Store the ID from the form submission
    // SQL query to delete the player with the specified ID
    $sqlDelete = "Delete FROM players where playerId='$enteredID'";
    // Execute the delete query
    $queryRes = mysqli_query($connectionObject, $sqlDelete);
    
    // Check if the query was successful
    if ($queryRes) {
        echo "Data Deleted!"; // Display success message
    } else {
        // Display the error message if the query failed
        mysqli_error($queryRe); // Incorrect variable should be corrected in actual code
    }
}
?>
