<?php

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
    $sql = "SELECT * FROM questions WHERE id = $question_id";
    $result = $conn->query($sql);
    $question = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Question</title>
</head>
<body>
    <header>
        <h1>Edit Question</h1>
    </header>

    <form action="admin_actions.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
        <label for="question_text">Question Text:</label>
        <textarea name="question_text" id="question_text" rows="4" required><?php echo $question['question_text']; ?></textarea>

        <label for="question_type">Question Type:</label>
        <select name="question_type" id="question_type">
            <option value="star" <?php echo $question['question_type'] == 'star' ? 'selected' : ''; ?>>Star Rating</option>
            <option value="yesno" <?php echo $question['question_type'] == 'yesno' ? 'selected' : ''; ?>>Yes/No</option>
            <option value="text" <?php echo $question['question_type'] == 'text' ? 'selected' : ''; ?>>Text</option>
        </select>

        <button type="submit" name="edit_question" class="primary">Save Changes</button>
    </form>

    <footer>
        <p>Feedback System - Admin Panel</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
