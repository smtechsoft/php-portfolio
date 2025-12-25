<?php

use App\Services\DbQuery;

$db = new DbQuery();



$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$subject = $_POST['subject'] ?? '';

if (empty($name)) {
    header('Location: /contact?name_error=Name is required');
    exit();
}

if (empty($email)) {
    header('Location: /contact?email_error=Email is required');
    exit();
}

if (empty($subject)) {
    header('Location: /contact?subject_error=Subject is required');
    exit();
}
if (empty($message)) {
    header('Location: /contact?message_error=Message is required');
    exit();
}



if (!empty($name) && !empty($email) && !empty($message) && !empty($subject)) {
    $db->insert('contacts', [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ]);
}
