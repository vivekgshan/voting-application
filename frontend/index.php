<?php
$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'votingdb';
$user = getenv('DB_USER') ?: 'votinguser';
$pass = getenv('DB_PASS') ?: 'votingpass';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vote = $_POST['vote'];

    $stmt = $conn->prepare("INSERT INTO votes (option_name) VALUES (?)");
    $stmt->bind_param("s", $vote);

    if ($stmt->execute()) {
        $message = "Thank you for voting!";
    } else {
        $message = "Error recording vote.";
    }
    $stmt->close();
}
?>
