# Class Send SMS with API Twilio

study tests with PHPUnit and API intagration.

### Using
```php
git clone https://github.com/mariolucasdev/send-sms-twilio.git
```

### Install Dependences
```php
composer install
```

### Setup Contants to use

1 - Create your accoun in https://www.twilio.com/pt-br/

2 - Generate your ID, TOKEN and you PHONE CONSOLE

3 - Create env.php file in root project with this structure
```php
define('ID',''); // Your Twilio ID
define('TOKEN',''); // Yout Twilio Token
define('PHONE_CONSOLE', ''); // Your Phone Console
define('YOUR_PHONE_TO_TEST', ''); // Your Phone to Test
```

4 - Use Sms class
```php
require 'env.php';
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/Sms.php';

$phoneTo = ''; // Set phone to message
$message = ''; // Set your messa here

$sms = new Sms(ID, TOKEN);

$sms->setPhoneConsole(PHONE_CONSOLE);
$sms->setPhone($phoneTo); 
$sms->sendSms($message);
```

### Run Tests
```php
./vendor/bin/phpunit tests
```

### Finish