<?php
$to      = 'alagirivimal@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: noreply@app4cure.co.in' . "\r\n" .
    'Reply-To: alagirivimal@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers))
{
    echo "OK";
}
else
{
    echo "NOT";
}
?>