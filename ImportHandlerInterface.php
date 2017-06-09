<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (�����)
 * @date 01.09.2016
 */
namespace skeeks\cms\import;
use skeeks\cms\import\helpers\ImportResult;
use yii\base\Component;

/**
 * @property string $id;
 * @property string $name;
 * @property string $type;  //Import type csv, xml or null
 *
 * Interface ImportHandlerInterface
 * @package skeeks\cms\import
 */
interface ImportHandlerInterface
{
    /**
     * @return ImportResult
     */
    public function execute();
}