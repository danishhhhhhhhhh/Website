<?php
// order.php

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input values
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $jersey = htmlspecialchars(trim($_POST["jersey"])); // Updated from "jacket" to match form

    // Basic validation
    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($jersey)) {

        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO orders (name, email, jersey) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $jersey);

        if ($stmt->execute()) {
            echo "<script>alert('Order placed successfully!'); window.location.href='index.html';</script>";
        } else {
            echo "Error inserting order: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Invalid form submission. Please check your input.'); window.history.back();</script>";
    }
}

$conn->close();
?>
