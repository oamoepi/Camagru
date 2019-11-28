<?php

function sendEmail($to, $subject, $message)
{
    $headers = 'From:noreply@Camagru_stuff.com' . "\r\n";
    mail($to, $subject, $Message,  $headers);
    return;
}