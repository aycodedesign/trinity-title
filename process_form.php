<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $firstname = htmlspecialchars(trim($_POST['First-Name']));
    $lastname = htmlspecialchars(trim($_POST['Last-Name']));
    $phonenumber = htmlspecialchars(trim($_POST['Phone-Number']));
    $email = htmlspecialchars(trim($_POST['Email']));
    $message = htmlspecialchars(trim($_POST['Message']));

    // Validate required fields
    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($message)) {
        // Email setup
        $to = "info@trinitytitleescrow.com";
        $subject = "New Form Submission from $email";
        $body = "Name: $firstname $lastname\nEmail: $email\nPhone Number: $phonenumber\nMessage:\n$message\n";
        $headers = "From: no-reply@yourdomain.com\r\nReply-To: $email\r\n";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "success"; // Respond to the client (for JS or AJAX use)
        } else {
            echo "error"; // Email sending failed
        }
    } else {
        echo "error"; // Missing fields
    }
} else {
    echo "error"; // Invalid request method
}
?>