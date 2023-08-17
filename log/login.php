<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //echo var_dump($_POST);
    //Your database connection details
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "cc";

    // Create a database connection
    $conn = new mysqli("localhost","root", "", "cc");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        echo "Connected to db" . "</br>";
    }

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM cc WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if a user with the given username exists
    if ($user) {
        // Verify the password
        if ($password == $user['password']) {
            // Username and password are correct, set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];

            // Redirect to the desired page
            header("Location: http://localhost/new%20hello%20mobiles/homepage.html");
            exit();
        } else {
            // Invalid password
            echo "Invalid username or password.";
        }
    } else {
        // User not found
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
