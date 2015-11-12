<?php


$name = @trim(stripslashes($_POST['nom']));
    $email = @trim(stripslashes($_POST['email'])); 
    $subject = @trim(stripslashes($_POST['subject'])); 
    $message = @trim(stripslashes($_POST['message'])); 

    $email_from = $email;
    $email_to = 'ezechiel.gnepa09@yahoo.com';

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

header('location:../index.php?page=mecontacter');