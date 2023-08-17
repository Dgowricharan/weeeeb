<?php
include 'login.php'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'contactus');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contacts (fullname, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $subject, $message);

    if ($stmt->execute()) {
        // Redirect to the specified link
        header("Location: http://localhost/new%20hello%20mobiles/homepage.html");
        echo "Data inserted successfully"
        exit();
    } else {
        echo "Error: ". $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>