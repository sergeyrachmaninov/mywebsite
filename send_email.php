<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

    // Set recipient email address
    $to = "network_solutions@austinmcmurry.uk"; // email address

    // Set email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Send email using a secure method
    if (send_email($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Your message has been sent successfully!";
    } else {
        // Error sending email
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Don't redirect if the form has not been submitted
}

// Function to send email securely
function send\_email($to, $subject, $message, $headers) {
    // Check if all required parameters are provided
    if (!empty($to) && !empty($subject) && !empty($message) && !empty($headers)) {
        // Send email
        return mail($to, $subject, $message, $headers);
    } else {
        // Error handling
        error\_log("Error sending email: Missing required parameters.");
        return false;
    }
}

?>
