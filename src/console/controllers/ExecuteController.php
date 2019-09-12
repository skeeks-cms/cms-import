<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 07.09.2016
 */
namespace skeeks\cms\import\console\controllers;
use skeeks\cms\agent\models\CmsAgent;
use skeeks\cms\components\Cms;
use skeeks\cms\export\helpers\ExportResultConsole;
use skeeks\cms\export\models\ExportTask;
use skeeks\cms\helpers\StringHelper;
use skeeks\cms\import\helpers\ImportResultConsole;
use skeeks\cms\import\models\ImportTask;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Выполнение задач
 */
class ExecuteController extends Controller
{
    /**
     * Выполнить задачу
     * @param $id номер задачи
     */
    public function actionTask($id)
    {
        /**
         * @var ImportTask $exportTask
         */
        $exportTask = ImportTask::findOne(['id' => $id]);
        if (!$exportTask)
        {
            $this->stdout("Задача №{$id} не найдена.\n", Console::FG_RED);
            return false;
        }

        $this->stdout("Задача №{$id} — {$exportTask->name}.\n", Console::BOLD);
        $handler = $exportTask->handler;
        if (!$handler)
        {
            $this->stdout("Не найден обработчик $exportTask->component\n", Console::FG_RED);
            print_r(array_keys(\Yii::$app->cmsImport->handlers));
            return false;
        }

        $handler->setResult(new ImportResultConsole([
            'controller' => $this
        ]));

        $handler->execute();
    }
}