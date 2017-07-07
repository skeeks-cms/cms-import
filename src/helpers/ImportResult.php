<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 29.08.2016
 */
namespace skeeks\cms\import\helpers;

use yii\base\Component;

class ImportResult extends Component
{
    public $success     = true;
    public $message     = '';

    protected $_stdouts = [];

    /**
     * @param $message
     * @param $int @see
     *
     * @return $this
     */
    public function stdout($message, $int = 0)
    {
        if (is_array($message))
        {
            $this->_stdouts[] = print_r($message, true);
        } else
        {
            $this->_stdouts[] = $message;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode("", $this->_stdouts);
    }
}