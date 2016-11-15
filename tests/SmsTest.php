<?php

namespace Tests;

use HyanCat\AliyunSMS\SmsService;
use PHPUnit_Framework_TestCase;

/**
 * SMS test.
 */
class SmsTest extends PHPUnit_Framework_TestCase
{
    protected $sms;

    public function __construct()
    {
        $this->sms = new SmsService('xxx', 'yyy');
    }

    public function testSendMessage()
    {
        $this->sms->send('1234567890', function ($message) {
            $message->with(['foo' => 'bar'])->template('SMS_13190010')->signName('阿里云');
        });
    }
}
