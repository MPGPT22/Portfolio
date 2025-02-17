<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Connect to the database to fetch the username
    require 'db.php';

    $stmt = $db->prepare("SELECT username FROM users WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $username = htmlspecialchars($user['username']); // Escape for safety
        } else {
            echo "Error: User not found.";
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    // Redirect to login page if not logged in
    header("Location: ../index.php");
    exit();
}
?>
