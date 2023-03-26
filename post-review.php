<?php
$servername = "localhost";
$username = "root";
$password = "hman123";
$dbname = "clayation_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$review = $_POST['review'];

// Insert data into database
$sql = "INSERT INTO reviews (first_name, last_name, review) VALUES ('$first_name', '$last_name', '$review')";

if ($conn->query($sql) === TRUE) {
    // Redirect back to the original HTML page
    header("Location: reviews.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
