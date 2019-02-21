<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/21/2019
 * Time: 10:40 AM
 */

namespace XavierIV\Communique\Interfaces;


interface INotification
{
    public function to($recipient);

    public function from($sender);

    public function heading($heading);

    public function compose($message);

    public function directTo($url);

    public function notify();

    public function structure();

}