<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$student_name = $_POST['student_name'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$date_of_birth = $_POST['date_of_birth'];
$aadhaar_number = $_POST['aadhaar_number'];
$category = $_POST['category'];
$permanent_address = $_POST['permanent_address'];
$mailing_address = $_POST['mailing_address'];
$mobile_number = $_POST['mobile_number'];
$jee_roll_number = $_POST['jee_roll_number'];
$uptech_rank = $_POST['uptech_rank'];

// Prepare SQL statement
$sql = "INSERT INTO students (student_name, father_name, mother_name, date_of_birth, aadhaar_number, category, permanent_address, mailing_address, mobile_number, jee_roll_number, uptech_rank) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssi", $student_name, $father_name, $mother_name, $date_of_birth, $aadhaar_number, $category, $permanent_address, $mailing_address, $mobile_number, $jee_roll_number, $uptech_rank);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
