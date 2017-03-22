# aliyun-sms-php

阿里云短信服务 for PHP. 

> ***Deprecated!!!***
> 
> *Use https://github.com/HyanCat/short-messenger instead.*

## Installation

    composer require hyancat/aliyun-sms-php

## Usage

### In a general way

```php
$sms = new SmsService('[TEST_APP_ID]', '[TEST_APP_KEY]');
$sms->send('[PHONE_NUMBER]', function ($message) {
    $message->template('[TEMPLATE_NAME]')->with([
        'code'    => '我是验证码',
        'product' => '我是产品',
    ])->signName('我是签名');
});
```

### For laravel or lumen

    Todo...

## License

The source code is under [MIT License](https://github.com/HyanCat/aliyun-sms-php/blob/master/LICENSE).



