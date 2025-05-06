<?php
// admin_actions.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add a new question
if (isset($_POST['add_question'])) {
    $question_text = $_POST['question_text'];
    $question_type = $_POST['question_type'];

    $sql = "INSERT INTO questions (question_text, question_type) VALUES ('$question_text', '$question_type')";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_panel.php"); // Redirect back to the admin panel
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
