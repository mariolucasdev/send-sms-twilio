<?php

require __DIR__.'/vendor/autoload.php';

use Twilio\Rest\Client;

class Sms {

  private string $id;
  private string $token;
  private string $phone;
  private string $phoneConsole;

  public function __construct( string $id, string $token )
  {
    $this->id = $id;
    $this->token = $token;
  }

  /**
   * Get the value of phone
   */ 
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set the value of phone
   *
   * @return  self
   */ 
  public function setPhone($phone)
  {
    $phoneIsValid = $this->checkPhoneFormat($phone);
    
    if(!$phoneIsValid) {
      return false;
    }

    $this->phone = $phoneIsValid;
    return $this;
  }

  /**
   * Get the value of phoneConsole
   */ 
  public function getPhoneConsole()
  {
    return $this->phoneConsole;
  }

  /**
   * Set the value of phoneConsole
   *
   * @return  self
   */ 
  public function setPhoneConsole($phoneConsole)
  {
    $this->phoneConsole = $phoneConsole;

    return $this;
  }

  /**
   * Send Sms to Phone contact
   * @param string $message
   */
  public function sendSms(string $message)
  {
    $client = new Client(ID,TOKEN);
    $client->messages->create(
      $this->getPhone(),
      [
        'from' => $this->getPhoneConsole(),
        'body' => $message
      ]
    );
  }

  /**
   * Check format phone
   * @param string $phone
   */
  public static function checkPhoneFormat($phone)
  {
    $phone = str_replace(['(', ')', '-', ' ', '+'], '', $phone);
    if(strlen($phone) < 13):
      //echo 'O formato de telefone inválido. Entre conforme o ex.: 5587999999999';
      return false;
    endif;
    return '+'.$phone;
  }
}