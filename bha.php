<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $request_type = htmlspecialchars($_POST["request_type"]);
    $message = htmlspecialchars($_POST["message"]);

    // Database connection parameters
    $servername = "your_database_host";
    $username = "your_database_username";
    $password = "your_database_password";
    $dbname = "your_database_name";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO your_table (name, email, request_type, message) VALUES ('$name', '$email', '$request_type', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: your_form_page.html");
    exit();
}
?>