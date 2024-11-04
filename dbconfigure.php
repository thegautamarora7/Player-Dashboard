<?php

// Database connection parameters
$hostname = 'localhost'; // Hostname of the database server
$username = 'root'; // Database username
$password = ''; // Database password (empty for default root user on some systems)
$database = 'dbBingo'; // Name of the database to connect to

// Establishing a connection to the database
$connectionObject = mysqli_connect($hostname, $username, $password, $database); // Connect to the MySQL database

?>