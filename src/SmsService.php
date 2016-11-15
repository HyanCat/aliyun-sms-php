<?php

namespace HyanCat\AliyunSMS;

require_once __DIR__ . '/../lib/aliyun-php-sdk-sms/aliyun-php-sdk-core/Config.php';

use Sms\Request\V20160927 as SMS;

/**
 * SMS Service
 */
class SmsService
{
    /**
     * SMS ACS Client Instance.
     * @var \DefaultAcsClient
     */
    protected $client;

    public function __construct($accessID, $accessKey, $region = 'cn-hangzhou')
    {
        $clientProfile = \DefaultProfile::getProfile("cn-hangzhou", $accessID, $accessKey);
        $this->client  = new \DefaultAcsClient($clientProfile);
    }

    public function send($receivers, callable $callback)
    {
        if (is_string($receivers)) {
            $receivers = [$receivers];
        }

        $message = new ShortMessage();
        if ($callback instanceof \Closure) {
            call_user_func($callback, $message);
        }

        $request = new SMS\SingleSendSmsRequest();
        foreach ($receivers as $receiver) {
            $request->setSignName($message->getSignName());
            $request->setTemplateCode($message->getTemplate());
            $request->setRecNum($receiver);
            $request->setParamString($message->getParams());
            try {
                $response = $this->client->getAcsResponse($request);
                print_r($response);
            } catch (\ClientException $e) {
                throw new SmsException($e->getErrorMessage(), -1);
            }
        }
    }
}
