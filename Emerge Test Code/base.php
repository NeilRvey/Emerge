<!-- I dont have any data base I can use right now. -->

<?php
$personalinfo = "personal_information";
$username = "username";
$password = "password";
$dbname = "emerge_data_base";
// Create connection
$conn = new mysqli($personalinfo, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

// Prepare SQL statement
$sql = "INSERT INTO Personal_infos (firstName, lastName, dob, gender) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ssss", $firstName, $lastName, $dob, $gender);

// Execute statement
if ($stmt->execute()) {
  echo "Data inserted successfully!";
} else {
  echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>