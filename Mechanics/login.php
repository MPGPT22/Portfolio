<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get username and password from POST data
    $username = isset($_POST['username']) ? trim($_POST['username']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Validate inputs
    if (empty($username) || empty($password)) {
        echo "Error: Username and password are required.";
        exit();
    }

    // Fetch the user from the database
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        echo "Database error: " . $db->error;
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $storedPassword = $user['password'] ?? null; // Ensure the password exists

        // Debugging: Check stored password
        if (is_null($storedPassword)) {
            echo "Error: Password not found in the database.";
            exit();
        }

        // Verify the password
        if (password_verify($password, $storedPassword)) {
            $_SESSION['user_id'] = $user['id'];
            echo "Login successful! Welcome, " . htmlspecialchars($username) . ".";
            header('Location: ../Backend/main.php');
        } else {
            echo "Error: Invalid password.";
        }
    } else {
        echo "Error: User not found.";
    }

    $stmt->close();
} else {
    echo "Error: Invalid request method.";
}
?>
