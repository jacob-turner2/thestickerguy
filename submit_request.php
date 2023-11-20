<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

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

    // Mailgun API credentials
    $mgClient = Mailgun::create(getenv('0c70e849177a816269a5cd54a33f3dc0-5d2b1caa-7f8ff39e')); // Replace with your API key
    $domain = getenv('sandbox0985551ca46d4b069cf8f11fd8cf9fc4.mailgun.org'); // Replace with your Mailgun domain

    // Prepare the email data
    $params = array(
        'from'    => 'jacobturner127@hotmail.com', // Replace with your email
        'to'      => 'thestickerguy@outlook.com',
        'subject' => 'New Sticker Request',
        'text'    => $emailContent
    );

    // Send the email
    try {
        $result = $mgClient->messages()->send($domain, $params);
        echo "Request sent successfully!";
    } catch (Exception $e) {
        echo 'Failed to send the request: ' . $e->getMessage();
    }
}
?>

