
<?php
$con = mysqli_connect("localhost", "root", "", "employee");

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>

<?php
// Database connection settings
$host = 'localhost'; // Change this to your database host
$dbname = 'employee'; // Change this to your database name
$username = 'root'; // Change this to your database username
$password = ''; // Change this to your database password

// Attempt to establish a connection to the database
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check if there are any connection errors
if ($mysqli->connect_errno) {
    // Connection failed, display an error message
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
} else {
    // Connection successful, display a success message
    echo "Connected to MySQL database successfully";
}

// Close the database connection
$mysqli->close();
?>

