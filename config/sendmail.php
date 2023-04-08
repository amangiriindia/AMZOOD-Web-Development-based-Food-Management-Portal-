<?php
$to_email = "ag4982324@gmail.com";
$subject = "Email Activation";
$body = "Hi,  i am amaan";
$sender_email = "From: amangiri381@gmail.com" ;
if(mail($to_email, $subject, $body, $sender_email)){
  echo "Email successfully sent to $to_email... ";
}
else{
    echo "Email sending failed...";
}
?> 