<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Set recipient email address
    $to = "austincmcmurry@proton.me"; // email address
    
    // Set email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Your message has been sent successfully!";
    } else {
        // Error sending email
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Redirect to contact page if accessed directly
    header("Location: contact.html");
    exit;
}
?>
