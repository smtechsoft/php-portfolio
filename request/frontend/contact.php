<?php

use App\Services\DbQuery;

$db = new DbQuery();



$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$subject = $_POST['subject'] ?? '';
$form_page = $_POST['form_page'] ?? '';

if (empty($name)) {
    if (!empty($form_page) && $form_page == 'contaact_page') {
        header('Location: /contact?name_error=Name is required');
        exit();
    } else {
        header('Location: /?name_error=Name is required');
        exit();
    }
}

if (empty($email)) {
    if (!empty($form_page) && $form_page == 'contaact_page') {
        header('Location: /contact?email_error=Email is required');
        exit();
    } else {
        header('Location: /?email_error=Email is required');
        exit();
    }
}

if (empty($subject)) {
    if (!empty($form_page) && $form_page == 'contaact_page') {
        header('Location: /contact?subject_error=Subject is required');
        exit();
    } else {
        header('Location: /?subject_error=Subject is required');
        exit();
    }
}
if (empty($message)) {
    if (!empty($form_page) && $form_page == 'contaact_page') {
        header('Location: /contact?message_error=Message is required');
        exit();
    } else {
        header('Location: /?message_error=Message is required');
        exit();
    }
}



if (!empty($name) && !empty($email) && !empty($message) && !empty($subject)) {
    $db->insert('contacts', [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ]);

    if (!empty($form_page) && $form_page == 'contaact_page') {
        header('Location: /contact?success=Message sent successfully');
        exit();
    } else {
        header('Location: /?success=Message sent successfully');
        exit();
    }
    
}