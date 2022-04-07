<?php

require 'env.php';
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/Sms.php';

$phoneTo = ''; // Set phone to message
$message = ''; // Set your messa here

$sms = new Sms(ID, TOKEN);

$sms->setPhoneConsole(PHONE_CONSOLE);
$sms->setPhone($phoneTo); 
$sms->sendSms($message);