<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve the input
    $user_input = htmlspecialchars($_POST['user_input']);

    // Process the input as needed (e.g., logging or manipulation)
    // For now, we'll just return the input back

    // Example: You can log the input to a file (optional)
    // file_put_contents('log.txt', $user_input . PHP_EOL, FILE_APPEND);

    // You can modify the input here to simulate a MITM attack (for example, change the text)
    $modified_input = "Modified: " . $user_input;

    // Respond back with the modified input
    echo "<h2>You submitted:</h2>";
    echo "<p>" . $modified_input . "</p>";
    echo "<a href='/'>Go back</a>";
} else {
    echo "No input received.";
}
?>
