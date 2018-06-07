<?php
/**
 * Created by PhpStorm.
 * User: ujjwal
 * Date: 12/6/17
 * Time: 8:17 PM
 */

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Log;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use Symfony\Component\Console\Exception\InvalidOptionException;

class PushNotificationHelper
{
    static function send($token, $title, $body, $data)
    {
        try {
            $data['title'] = $title;
            $data['body'] = $body;

            Log::info('Building Push notification', $data);

            $optionBuilder = new OptionsBuilder();

            $optionBuilder->setTimeToLive(60 * 20);

            $notificationBuilder = new PayloadNotificationBuilder($title);
            $notificationBuilder->setBody($body)
                ->setSound('default');

            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData($data);

            $option = $optionBuilder->build();
            $data = $dataBuilder->build();

            if ($token) {
                Log::info('Sending Push notification', [$token]);
                FCM::sendTo($token, $option, null, $data);
            }
        } catch (InvalidOptionException $e) {
            Log::info('Exception Push notification', [$e->getMessage()]);
        } catch (Exception $e) {
            Log::info('Exception Push notification', [$e->getMessage()]);
        }
    }
}
