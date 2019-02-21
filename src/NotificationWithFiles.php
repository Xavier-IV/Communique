<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/21/2019
 * Time: 10:48 AM
 */

namespace XavierIV\Communique;

use XavierIV\Communique\Interfaces\IAttachFile;

class NotificationWithFiles extends Notification implements IAttachFile
{
    protected $file;
    protected $caption;

    public function file($file)
    {
        $this->file = $file;
        return $this;
    }

    public function caption($caption)
    {
        $this->caption = $caption;
        return $this;
    }
}