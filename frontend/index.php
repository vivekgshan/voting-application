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
        $message = "✅ Thank you for voting!";
    } else {
        $message = "❌ Error recording vote.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Voting App</title>
</head>
<body>
    <h1>🗳️ Vote for your favorite option</h1>

    <?php if ($message): ?>
        <p><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>

    <form method="post">
        <label><input type="radio" name="vote" value="Option A" required> Option A</label><br>
        <label><input type="radio" name="vote" value="Option B"> Option B</label><br>
        <label><input type="radio" name="vote" value="Option C"> Option C</label><br>
        <button type="submit">Submit Vote</button>
    </form>
</body>
</html>

