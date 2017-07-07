<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 29.08.2016
 */
namespace skeeks\cms\import\helpers;

use yii\console\Controller;

class ImportResultConsole extends ImportResult
{
    /**
     * @var Controller
     */
    public $controller;
    /**
     * @param $message
     *
     * @return $this
     */
    public function stdout($message, $int = 0)
    {
        $this->controller->stdout($message, $int);
        return $this;
    }
}