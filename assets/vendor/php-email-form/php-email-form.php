<?php

// Replace this email address with your own
$to_email = 'dhruvgupta486@gmail.com';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n\n";
    $email_message .= "Message:\n$message";

    // Set headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Attempt to send the email
    if (mail($to_email, $subject, $email_message, $headers)) {
        // Email sent successfully
        echo json_encode(array('status' => 'success', 'message' => 'Your message has been sent. Thank you!'));
    } else {
        // Failed to send email
        echo json_encode(array('status' => 'error', 'message' => 'Unable to send email. Please try again later.'));
    }
} else {
    // If the form was not submitted, return an error
    echo json_encode(array('status' => 'error', 'message' => 'Form submission method not allowed.'));
}

?>
