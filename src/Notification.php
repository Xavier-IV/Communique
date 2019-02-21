<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/21/2019
 * Time: 10:48 AM
 */

namespace XavierIV\Communique;

use XavierIV\Communique\Interfaces\INotification;

class Notification extends NotificationCode implements INotification
{
    protected $parameters;
    protected $recipient;
    protected $message;

    protected $notification;
    protected $fields;
    protected $url;
    protected $heading;

    protected $notify_endpoint;

    public function structure()
    {
    }

    public function from($sender)
    {
        $this->from = $sender;
        return $this;
    }

    public function to($recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function heading($heading)
    {
        $this->heading = $heading;
        return $this;
    }

    public function directTo($url)
    {
        $this->url = $url;
        return $this;
    }


    public function compose($message)
    {
        $this->message = $message;
        return $this;
    }

    public function notify()
    {
        $this->structure();
        $fields = json_encode($this->fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->notify_endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json; charset=utf-8',]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        $response = json_decode($response);
        curl_close($ch);
        dd($response);
        return $response;
    }

}