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
        $this->sms = new SmsService('TEST_APP_ID', 'TEST_APP_KEY');
    }

    public function testSendMessage()
    {
        $this->sms->send('[PHONE_NUMBER]', function ($message) {
            $message->template('SMS_13190009')->with([
                'code'    => '我是验证码',
                'product' => '我是产品',
            ])->signName('我是签名');
        });
    }
}
