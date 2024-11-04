<?php
// Include database configuration file to connect to the database
require_once 'dbconfigure.php';

// SQL statement to select all records from the players table
$selectStatement = "SELECT * FROM players";
// Execute the SQL query
$res = mysqli_query($connectionObject, $selectStatement);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<!-- Link to Bootstrap CSS for styling -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="form">
<p>
    <a href="dashboard.php">Home</a> 
    | <a href="insert.php">Insert New Record</a>
    <a href="update.php">Update the Record</a> 
    <a href="delete.php">Delete the Record</a> 
    | <a href="logout.php">Logout</a>
</p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
    <th><strong>Player Id</strong></th>
    <th><strong>Name</strong></th>
    <th><strong>Age</strong></th>
    <th><strong>Gender</strong></th>
    <th><strong>Sports Interested</strong></th>
    <th><strong>Competition(National/International)</strong></th>
</tr>
</thead>
<tbody>
<?php
// Fetch each row using mysqli_fetch_array
while ($row = mysqli_fetch_array($res)) {
    // Fetch individual columns using both associative and numeric indexes
    $fetchedId = $row["playerId"]; // Player ID
    $fetchedName = $row["playerName"]; // Player Name
    $fetchedAge = $row["playerAge"]; // Player Age
    $fetchedGender = $row["Gender"]; // Player Gender
    $fetchedSports = $row["sportsName"]; // Sports interested
    $fetchedCompetition = $row["competitionLevel"]; // Competition level

    // Display each record inside table row
    echo "<tr style='text-align: center'>";
    echo "<td>$fetchedId</td>"; // Display Player ID
    echo "<td>$fetchedName</td>"; // Display Player Name
    echo "<td>$fetchedAge</td>"; // Display Player Age
    echo "<td>$fetchedGender</td>"; // Display Player Gender
    echo "<td>$fetchedSports</td>"; // Display Sports interested
    echo "<td>$fetchedCompetition</td>"; // Display Competition level
    echo "</tr>"; // End table row
}
?>
</tbody>
</table>
</div>
</body>
</html>




