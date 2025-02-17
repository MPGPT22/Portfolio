<?php
session_start();

$username = 'Guest'; // Default for non-logged-in users

if (isset($_SESSION['user_id'])) {
    require 'db.php';

    $stmt = $db->prepare("SELECT username FROM users WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $username = htmlspecialchars($user['username']); // Escape for safety
        }

        $stmt->close();
    }
}
?>
