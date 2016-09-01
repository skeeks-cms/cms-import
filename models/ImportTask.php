<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 31.08.2016
 */
namespace skeeks\cms\import\models;

use skeeks\cms\import\ImportHandlerInterface;
use skeeks\cms\models\behaviors\Serialize;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%import_task}}".
 *
 * @property integer $id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $name
 * @property string $description
 * @property string $component
 * @property string $component_settings
 *
 * @property Handler $handler
 */
class ImportTask extends \skeeks\cms\models\Core
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%import_task}}';
    }

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            Serialize::className() =>
            [
                'class' => Serialize::className(),
                'fields' => ['component_settings']
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['component'], 'required'],
            [['component_settings'], 'safe'],
            [['description'], 'string'],
            [['name', 'component'], 'string', 'max' => 255],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => Yii::t('skeeks/import', 'ID'),
            'name' => Yii::t('skeeks/import', 'Name'),
            'description' => Yii::t('skeeks/import', 'Description'),
            'component' => Yii::t('skeeks/import', 'Component'),
            'component_settings' => Yii::t('skeeks/import', 'Component Settings'),
        ]);
    }

    /**
     * @return ImportHandlerInterface
     * @throws \skeeks\cms\import\InvalidParamException
     */
    public function getHandler()
    {
        if ($this->component)
        {
            try
            {
                /**
                 * @var $component Component
                 */
                $component = \Yii::$app->cmsImport->getHandler($this->component);
                $component->taskModel = $this;
                $component->load($this->component_settings, "");

                return $component;
            } catch (\Exception $e)
            {
                return false;
            }

        }

        return null;
    }
}