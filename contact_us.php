<?php
$db_hostname = "smtp.gmail.com";
$db_username = "anshsingh160704@gmail.com";
$db_password = "";
$db_name = "tour";

// Create a connection
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact (Name, Email, Phone, Subject, Message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

// Set parameters and execute
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$subject = htmlspecialchars(trim($_POST['subject']));
$message = htmlspecialchars(trim($_POST['message']));

if ($stmt->execute()) {
    echo "We will contact you soon";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>