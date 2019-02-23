<?php

$email=$_REQUEST['Email'];
$firstName=$_REQUEST['FirstName'];
$lastName=$_REQUEST['LastName'];
$header = array();
//The Attachment
$cr = "\n";  
$data = "Email" . ',' . "First Name" . ',' . "Last Name" . $cr;
$data .= "$email" . ',' . "$firstName" . ',' . "$lastName" . $cr;
$fp = fopen('file.csv','a');
fwrite($fp,$data);
fclose($fp);

// Mail to
$email = "cvollrath97@gmail.com";

//subject
$subject = "Test";

//Header
$header("Content-type: application/octet-stream");
$header("Content-Disposition: attachment; filename=test.csv");
$header("Pragma: no-cache");
$header("Expires: 0");


//Message
$message = "".
"Email: $email" . "\n" .
"First Name: $firstName" . "\n" .
"Last Name: $lastName";

mail($email, $subject, $message, $header);



$attachments[] = Array(
   'data' => $data,
   'name' => 'data-file-name.csv',
   'type' => 'application/vnd.ms-excel'  

);

/**
 * Generate a boundary string
 **/

$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

/**
 * Add the headers for a file attachment
 **/

$header = "MIME-Version: 1.0\n" .
           "From: {$from}\n" .
         "Cc: emaito@domain.com\n".
           "Content-Type: multipart/mixed;\n" .
           " boundary=\"{$mime_boundary}\"";

/** 
 * Add a multipart boundary above the plain message
 **/

$message = "This is a multi-part message in MIME format.\n\n" .
          "--{$mime_boundary}\n" .
          "Content-Type: text/html; charset=\"iso-8859-1\"\n" .
          "Content-Transfer-Encoding: 7bit\n\n" .
          $text . "\n\n";

/**
 * Add sttachments
 **/


foreach($attachments as $attachment){
   $data = chunk_split(base64_encode($attachment['data']));
   $name = $attachment['name'];
   $type = $attachment['type'];

   $message .= "--{$mime_boundary}\n" .
              "Content-Type: {$type};\n" .
              " name=\"{$name}\"\n" .              

              "Content-Transfer-Encoding: base64\n\n" .
              $data . "\n\n" ;   

}

$message .= "--{$mime_boundary}--\n";
mail($to, $subject, $message, $header);


?>