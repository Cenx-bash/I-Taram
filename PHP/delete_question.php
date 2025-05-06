<?php
// delete_question.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $question_id = $_GET['id'];

    $sql = "DELETE FROM questions WHERE id = $question_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_panel.php"); // Redirect back to the admin panel
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
