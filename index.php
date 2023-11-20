<?php
// Set the content type to HTML
header("Content-Type: text/html");

// Get the page parameter from the URL
$page = isset($_GET['page']) ? $_GET['page'] : '';

// Include the appropriate HTML file based on the page parameter
switch ($page) {
    case 'faq':
        include("faq.html");
        break;
    case 'gallery':
        include("gallery.html");
        break;
    case 'request':
        include("request.html");
        break;
    default:
        include("homepage.html");
}

?>
