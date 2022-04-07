<?php

namespace Tests;

require __DIR__.'./../env.php';

use PHPUnit\Framework\TestCase;
use Sms;

class SmsTest extends TestCase
{
  /**
   * @author Mário Lucas
   * @after
   * Verify if attribute id was set
   */
  public function testAttributeId()
  {
    $this->assertObjectHasAttribute('id', new Sms(ID, TOKEN));
  }
  
  /**
   * @author Mário Lucas
   * @after
   * Verify if attribute token was set
   */
  public function testAttributeToken()
  {
    $this->assertObjectHasAttribute('token', new Sms(ID, TOKEN));
  }

  /**
   * @author Mário Lucas
   * verify if set and get phone is run ok
   */
  public function testPhoneSetAndGet()
  {
    $sms = new Sms(ID, TOKEN);
    $sms->setPhoneConsole(PHONE_CONSOLE);
    $phoneConsole = $sms->getPhoneConsole();
    $this->assertEquals(PHONE_CONSOLE, $phoneConsole);
  }

  /**
   * @author Mário Lucas
   * Verify send sms corretly
   */
  public function testSendMessage()
  {
    $sms = new Sms(ID, TOKEN);
    $sms->setPhoneConsole(PHONE_CONSOLE);
    $sms->setPhone(YOUR_PHONE_TO_TEST);
    $this->assertNull($sms->sendSms('Test Passed'));
  }

  /**
   * @author Mário Lucas
   * verify if validate phone corretly
   */
  public function testGetPhoneWithSpecialCaracters()
  {
    $sms = new Sms(ID, TOKEN);
    $phone = $sms::checkPhoneFormat(YOUR_PHONE_TO_TEST);
    $this->assertEquals(
      '+'.YOUR_PHONE_TO_TEST,
      $phone
    );
  }
  
  /**
   * @author Mário Lucas
   * verify if return false when param is not number
   */
  public function testPhoneWithTextFalse()
  {
    $sms = new Sms(ID, TOKEN);
    $phone = $sms::checkPhoneFormat('acb');
    $this->assertFalse($phone);
  }
}