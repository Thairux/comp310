<?php
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

// Retrieve the form data from the table
$sql = "SELECT * FROM form_data";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>View Submitted Data</title>
</head>
<body>
  <h2>Submitted Data</h2>
  <?php
  if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>ID</th><th>ID Number</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Phone Number</th><th>Email</th><th>Address</th><th>Date of Birth</th><th>Position</th></tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$row['id']."</td>";
          echo "<td>".$row['id_number']."</td>";
          echo "<td>".$row['first_name']."</td>";
          echo "<td>".$row['last_name']."</td>";
          echo "<td>".$row['gender']."</td>";
          echo "<td>".$row['phone_number']."</td>";
          echo "<td>".$row['email']."</td>";
          echo "<td>".$row['address']."</td>";
          echo "<td>".$row['date_of_birth']."</td>";
          echo "<td>".$row['position']."</td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "No data found.";
  }

  // Close the database connection
  $conn->close();
  ?>
</body>
</html>