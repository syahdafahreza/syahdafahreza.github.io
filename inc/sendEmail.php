<?php

// Replace this with your own email address
$to = 'no-reply@syahdafahreza.my.id';
ini_set("include_path", ";c:\php;" . ini_get("include_path") );
require "Mail.php";
$message ="";
$messageC ="";
$error ="";

if($_POST) {

   $name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Silahkan isi nama senpai terlebih dahulu.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Mohon untuk memasukkan alamat Email yang benar.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$error['message'] = "Silahkan masukkan pesan senpai. Pesan tidak boleh kosong atau setidaknya minimal 15 kata/huruf.";
	}
	
   // Subject
	if ($subject == '') { $subject = "Contact Form Submission"; }


    // Set Message For Me
	$message .= "Email dari: " . $name . "\r\n";
	$message .= "Alamat Email: " . $email . "\r\n";
	$message .= "Pesan: " . "\r\n";
	$message .= $contact_message . "\r\n";
	$message .= "----------------------------------------------------" . "\r\n";
	$message .= "Email ini dikirim dari contact form situs Anda (syahdafahreza.my.id).";
	
    // Set Message For Customer
    $messageC .= "Hello, " . $name . "." . "\r\n";
    $messageC .= " " . "\r\n";
	$messageC .= "Thank you for contacting me. " . "\r\n";
	$messageC .= "I will review your request and be in touch with an update as soon as possible. Most requests take 1 days to review, but some might take longer. If there are additional messages, you can reply to this email." . "\r\n";
	$messageC .= " " . "\r\n";
	$messageC .= "Thanks for your patience. " . "\r\n";
	$messageC .= " " . "\r\n";
	$messageC .= "Sincerely, Syahda Fahreza.";

   // Set From: header
$from =  $name . " <" . $email . ">";
   
   // SMTP Config
   $host = "localhost";
/* If your domain is using the same server as MX then keep it to localhost and if its using remote MX then change localhost to the server name */
$username = "root";
/* Do specify the actual email account from the SMTP server */
$password = "root";
$smtp = Mail::factory('smtp',
array ('host' => $host,
'auth' => "plain",
'socket_options' => array('ssl' => array('verify_peer_name' => false, 'allow_self_signed' => true)),
'username' => $username,
'password' => $password));

// Some Settings

// Headers
    $headers = array ('From' => $_POST['contactEmail'],"Reply-To" => $email,'Subject' => $subject);
    $headersC = array ('From' => $to,"Reply-To" => "support@syahdafahreza.my.id",'Subject' => $subject);

   if (!$error) {
      $mail = $smtp->send($to, $headers, $message);
      $mail = $smtp->send($email, $headersC, $messageC);

		if ($mail) { echo "Pesan senpai telah terkirim! " . "\r\n";}
      else { echo "Something went wrong. Please try again."; }
      
      if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else { 
    echo("<br>" . "Jangan lupa cek folder SPAM jika email tidak masuk yaa. Terimakasih~");
}
		
	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error

}

?>