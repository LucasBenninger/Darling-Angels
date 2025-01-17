﻿<?php

// Replace this with your own email address
$siteOwnersEmail = 'info@darlingangels.ca';


if($_POST) {

   $name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$error['message'] = "Please enter your message. It should have at least 15 characters.";
	}
   // Subject
	if ($subject == '') { $subject = "Contact Form Submission"; }


   // Set Message
  //  $message .= "Email from: " . $name . "<br />";
	// $message .= "Email address: " . $email . "<br />";
  //  $message .= "Message: <br />";
  //  $message .= $contact_message;
  //  $message .= "<br /> <hr/> <br /> Sent from the contact form on <a href='https://darlingangels.ca/'>darlingangels.ca</a> <br />";

  $message .= "<!DOCTYPE html>
  <html>
  <head>
    <style>
      @font-face {
        font-family: 'Vincentia';
        src: url('https://darlingangels.ca/fonts/Vincentia.otf') format('opentype');
        font-style: normal;
        font-weight: normal;
      }

      h1{
        font-family: 'Vincentia', sans-serif;
        font-style: normal;
        text-rendering: optimizeLegibility;
      }
      hr{
         border: 0;
         height: 1px;
         background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
      }
      section{
        margin-left: auto;
        padding-left: 10%;
        margin-right: auto;
        padding-right: 10%;
      }
      body{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Darling Angels Photography</h1>
    </header>
    <hr/>
    <section>
      <br/>
      <span>Name: $name</span> <br/>
      <span>Email: $email</span><br/><br/>
      <span>Subject: $subject</span><br/><br/>
      <span>$contact_message</span><br/>
      <br/>
    </section>
    <hr/>
    <footer>&copy; Copyright Darling Angels Photography 2017.</footer>
  </body>
  </html>";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


   if (!$error) {

      ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      $mail = mail($siteOwnersEmail, $subject, $message, $headers);

		if ($mail) { echo "OK"; }
      else { echo "Something went wrong. Please try again."; }

	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;

		echo $response;

	} # end if - there was a validation error

}

?>