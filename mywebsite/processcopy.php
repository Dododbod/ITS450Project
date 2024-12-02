<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve the input
    $user_input = htmlspecialchars($_POST['user_input']);

    $modified_input = "Modified: " . $user_input . " -- I Stole your Password ;) ";

    // Respond back with the modified input
    echo "<h2>You submitted: $user_input </h2>";
    echo "<p>" . $modified_input . "</p>";
    echo "<a href='/'>Go back</a>";
} else {
    echo "No input received.";
}
?>
