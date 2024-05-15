<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = "https://formspree.io/f/moqgbpkn"; // Formsprees endpoint URL

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        echo "Error occurred while sending email.";
    } else {
        echo "Email sent successfully!";
    }
}
?>

