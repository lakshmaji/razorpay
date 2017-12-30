# Razorpay

[![Latest Stable Version](https://poser.pugx.org/lakshmaji/razorpay/v/stable)](https://packagist.org/packages/lakshmaji/razorpay)
[![Total Downloads](https://poser.pugx.org/lakshmaji/razorpay/downloads)](https://packagist.org/packages/lakshmaji/razorpay)
[![Latest Unstable Version](https://poser.pugx.org/lakshmaji/razorpay/v/unstable)](https://packagist.org/packages/lakshmaji/razorpay)
[![License](https://poser.pugx.org/lakshmaji/razorpay/license)](https://packagist.org/packages/lakshmaji/razorpay)
[![Monthly Downloads](https://poser.pugx.org/lakshmaji/razorpay/d/monthly)](https://packagist.org/packages/lakshmaji/razorpay)
[![Daily Downloads](https://poser.pugx.org/lakshmaji/razorpay/d/daily)](https://packagist.org/packages/lakshmaji/razorpay)
[![composer.lock](https://poser.pugx.org/lakshmaji/razorpay/composerlock)](https://packagist.org/packages/lakshmaji/razorpay)

[Razorpay officail documentation](https://docs.razorpay.com/v1/docs)
[Razorpay php library](https://github.com/razorpay/razorpay-php/)



>### What it is

 - [Razorpay](https://razorpay.com/features/) is providing single vendor platform for all payment gateway integrations. This package is used to integrate the razorpay with Laravel framework
 - This uses **razorpy-php**.

>### Version

1.0.5

>### Compatibility

**Laravel version**     | **Razorpay version**
-------- | ---
5.5      | 1.0.5
5.4 <=   | 1.0.5

**Note:** This package is completely relays on razorpay-php library, refer [here](http://github.com/razorpay/razorpay-php/) 

---

>### Installation

- This package is available on packagist
```bash
    composer require lakshmaji/razorpay
```

**NOTE** : This package service providers will be automatically registered with Laravel (uses package auto discovery feature :musical_note:)


- For applications which uses below 5.5, it is required to add the service providers and aliases to configuration file.

	- Add the Service Provider to **providers** array
```php
Lakshmaji\Razorpay\RazorpayServiceProvider::class,
```
	- Add the Facade to **aliases** array
```php
'Razorpay' => Lakshmaji\Razorpay\Facade\Razorpay::class,
```
	- Try updating the application with composer (dependencies but not mandatory :wink:  )
```bash
  composer update
```

---


---
>### Configurations

- Publish the configuration file , this will publish razorpay.php file to your application **config** directory.
```bash
    php artisan vendor:publish
```
- Configure the required Razorpay configurations. You can configure them from laravel .env file, the sample configurations in .env file 
```bash
#Razorpay configurations
RAZORPAY_KEY_ID=rzp_jhg54HVyt465fhj6FG
RAZORPAY_KEY_SECRET=hsjhgfYU76ghf56R^JH
```

---



>### Usage

 - Fetch payment details
 	```php
    	$this->api->getPaymentDetails($paymentId);
	```

 - Capture (verify) payment details
 	```php
    	$this->api->getPaymentDetails($paymentId, ['amount' => 500]);
	```


----
>### LICENSE

[MIT](https://opensource.org/licenses/MIT)


