<?php
require 'config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];

    $sql = "INSERT INTO registrations (user_id, course_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $course_id);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register for Course</title>
</head>
<body>
    <form method="POST" action="">
        Course ID: <input type="number" name="course_id" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
