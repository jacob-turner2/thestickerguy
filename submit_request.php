<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize form data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $size = htmlspecialchars($_POST['size']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $additionalComments = htmlspecialchars($_POST['additionalComments']);

    // Compose the email content
    $emailContent = "Name: $firstName $lastName\n";
    $emailContent .= "Email: $email\n";
    $emailContent .= "Size: $size\n";
    $emailContent .= "Quantity: $quantity\n";
    $emailContent .= "Additional Comments: $additionalComments\n";

    // Specify your email and subject
    $to = 'thestickerguy@outlook.com';
    $subject = 'New Sticker Request';

    // Headers
    $headers = "From: webmaster@example.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $emailContent, $headers)) {
        echo "Request sent successfully!";
    } else {
        echo "Failed to send the request.";
    }
}
?>
