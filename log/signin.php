<?php
// Enable error reporting and display errors on the page for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'login.php'; // Include your login.php file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match. Please try again.";
        exit();
    }

    // Hash the password (you should use a more secure hashing method)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'contactus');

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contact (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        // Redirect to the specified link after successful sign-up
        header("Location: http://localhost/path_to_your_login_page.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
