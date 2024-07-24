<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO courses (course_name, description, start_date, end_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $course_name, $description, $start_date, $end_date);
    
    if ($stmt->execute()) {
        echo "Course added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
</head>
<body>
    <form method="POST" action="">
        Course Name: <input type="text" name="course_name" required><br>
        Description: <textarea name="description" required></textarea><br>
        Start Date: <input type="date" name="start_date" required><br>
        End Date: <input type="date" name="end_date" required><br>
        <button type="submit">Add Course</button>
    </form>
</body>
</html>
