<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $surname = $_POST["surname"];
    $date_of_birth = $_POST["date_of_birth"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password securely
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $favorite_sports = implode(", ", $_POST["favorite_sports"]); // Convert array to comma-separated string
    $agree_terms = isset($_POST["agree_terms"]) ? 1 : 0; // Convert checkbox value to 1 or 0

    // Database connection details
    $servername = "localhost";
    $db_username = "root";  // Replace with your MySQL username
    $db_password = "";      // Replace with your MySQL password
    $database = "sports";   // Replace with your database name

    // Create a connection to the MySQL database
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email already exists in the database
    $check_email_sql = "SELECT id FROM user_data WHERE email = ?";
    $check_stmt = $conn->prepare($check_email_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "Error: You have already signed up with this email address.";
    } else {
        // Prepare and execute an SQL INSERT statement
        $insert_sql = "INSERT INTO user_data (first_name, surname, date_of_birth, username, email, password, phone, address, favorite_sports, agreed_to_terms)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sssssssssi", $first_name, $surname, $date_of_birth, $username, $email, $password, $phone, $address, $favorite_sports, $agree_terms);
        
        if ($stmt->execute()) {
            echo "Data submitted and stored successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
    }

    // Close the check statement and connection
    $check_stmt->close();
    $conn->close();
} else {
    // Handle the case where the form was not submitted
    echo "Form was not submitted.";
}
?>
