<?php
// Retrieve form data
$idNumber = $_POST['id_number'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$gender = $_POST['gender'];
$phoneNumber = $_POST['phone_number'];
$email = $_POST['email'];
$address = $_POST['address'];
$dateOfBirth = $_POST['date_of_birth'];
$position = $_POST['position'];

// Database connection details
$servername = "localhost";
$username = "peter";
$password = "taper1413";
$dbname = "forms";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the SQL table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS form_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_number VARCHAR(20) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    date_of_birth DATE NOT NULL,
    position VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === false) {
    echo "Error creating table: " . $conn->error;
}

// Insert the form data into the table
$sql = "INSERT INTO form_data (id_number, first_name, last_name, gender, phone_number, email, address, date_of_birth, position)
        VALUES ('$idNumber', '$firstName', '$lastName', '$gender', '$phoneNumber', '$email', '$address', '$dateOfBirth', '$position')";

if ($conn->query($sql) === true) {
    // Redirect to view_data.php after successful submission
    header("Location: view_data.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>