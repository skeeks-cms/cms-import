<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (�����)
 * @date 01.09.2016
 */
namespace skeeks\cms\import;
use skeeks\cms\base\ConfigFormInterface;
use skeeks\cms\import\helpers\ImportResult;
use skeeks\cms\import\models\ImportTask;
use yii\base\Component;
use yii\base\Model;
use yii\widgets\ActiveForm;

/**
 * Interface ImportHandlerInterface
 * @package skeeks\cms\import
 */
abstract class ImportHandler extends Model implements ImportHandlerInterface, ConfigFormInterface
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string Import type csv, xml or null
     */
    public $type;

    /**
     * @var ImportTask
     */
    public $taskModel;

    /**
     * @param ActiveForm $form
     */
    public function renderConfigForm(ActiveForm $form)
    {}

    /**
     * @param ActiveForm $form
     */
    public function renderWidget(ActiveForm $form)
    {
        echo 'Not found widget';
    }





    /**
     * @return ImportResult
     */
    public function execute()
    {
        return $this->result;
    }

    /**
     * @var ImportResult
     */
    protected $_result = null;

    /**
     * @return null|ImportResult
     */
    public function getResult()
    {
        if (!$this->_result)
        {
            $this->_result = new ImportResult();
        }

        return $this->_result;
    }

    /**
     * @param ImportResult $exportResult
     *
     * @return $this
     */
    public function setResult(ImportResult $exportResult)
    {
        $this->_result = $exportResult;
        return $this;
    }
}