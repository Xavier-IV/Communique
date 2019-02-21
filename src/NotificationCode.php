<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/21/2019
 * Time: 11:21 AM
 */

namespace XavierIV\Communique;


abstract class NotificationCode
{
    protected $code;
    protected $replaceable = ':';
    protected $message;

    protected $notification_model = 'App\Model\Application\Notification';
    protected $notification_code = 'notification_code';

    public function decode($decodable, $code)
    {
        $notification = $this->notification_model::where($this->notification_code, $code)->first();

        foreach ($decodable['customContent'] as $name => $content) {
            $this->message = str_replace($this->replaceable . $name, $content, $this->message);
        }

        return $this;
    }

}