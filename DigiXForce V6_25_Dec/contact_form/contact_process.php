<?php

include dirname(dirname(__FILE__)).'/mail.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{
include 'email_validation.php';

$name = stripslashes($_POST['name']);
$age = stripslashes($_POST['age']);
$phone = stripslashes($_POST['phone']);
$email = trim($_POST['email']);
$subject = stripslashes($_POST['subject']);
$message = stripslashes($_POST['message']);
$body = "From: $name\n E-Mail: $email\n Contact: $phone\n Age: $age\n Message: $message";
$sub = "Email from $name : $subject";


$error = '';

// Check name

if(!$name)
{
$error .= 'Please enter your name.<br />';
}

// Check Phone

if(!$phone)
{
$error .= 'Please enter your Mobile Number.<br />';
}

// Check email

if(!$email)
{
$error .= 'Please enter an e-mail address.<br />';
}

if($email && !ValidateEmail($email))
{
$error .= 'Please enter a valid e-mail address.<br />';
}

// Check message (length)

if(!$message || strlen($message) < 1)
{
$error .= "Please enter your message. It should have at least 10 characters.<br />";
}


if(!$error)
{
$mail = mail(CONTACT_FORM, $sub, $body,
     "From: ".$name." <".$email.">\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());


if($mail)
{
echo 'OK';
}

}
else
{
    $error.='From Admin';
echo '<div class="notification_error">'.$error.'</div>';
}

}
?>