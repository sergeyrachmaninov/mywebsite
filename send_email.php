<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require '/PHPMailer.php';
require '/SMTP.php';
require '/Exception.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

    // Set recipient email address
    $to = "austincmcmurry@proton.me"; // email address

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'route1.mx.cloudflare.net'; // Change this to the appropriate Cloudflare email server
    $mail->Port = 587; // Use the appropriate port (587 for TLS)
    $mail->SMTPSecure = 'tls'; // Use TLS encryption
    $mail->SMTPAuth = false; // Set to true if SMTP authentication is required
    $mail->Username = 'austincmcmurry@proton.me'; // Your Cloudflare email username (if required)
    $mail->Password = ""; // Your Cloudflare email password (if required)

    // Set email content
    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if ($mail->send()) {
        // Email sent successfully
        echo "Your message has been sent successfully!";
    } else {
        // Error sending email
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Don't redirect if the form has not been submitted
}
?>

