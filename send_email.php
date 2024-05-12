<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $name = filter\_input(INPUT\_POST, "name", FILTER\_SANITIZE\_SPECIAL\_CHARS);
    $email = filter\_input(INPUT\_POST, "email", FILTER\_VALIDATE\_EMAIL);
    $subject = filter\_input(INPUT\_POST, "subject", FILTER\_SANITIZE\_SPECIAL\_CHARS);
    $message = filter\_input(INPUT\_POST, "message", FILTER\_SANITIZE\_SPECIAL\_CHARS);

    // Set recipient email address
    $to = "austincmcmurry@proton.me"; // email address

    // Set email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Send email using a secure method
    if (send\_email($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Your message has been sent successfully!";
    } else {
        // Error sending email
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Redirect to contact page if accessed directly
    header("Location: index.html");
    exit;
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
