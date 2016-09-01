<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (—ÍËÍ—)
 * @date 01.09.2016
 */
namespace skeeks\cms\import;
use skeeks\cms\base\ConfigFormInterface;
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
}