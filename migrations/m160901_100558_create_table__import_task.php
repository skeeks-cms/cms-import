<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 30.08.2016
 */
use yii\db\Schema;
use yii\db\Migration;

class m160901_100558_create_table__import_task extends Migration
{
    public function safeUp()
    {
        $tableExist = $this->db->getTableSchema("{{%import_task}}", true);
        if ($tableExist)
        {
            return true;
        }

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%import_task}}", [
            'id'                    => $this->primaryKey(),

            'created_by'            => $this->integer(),
            'updated_by'            => $this->integer(),

            'created_at'            => $this->integer(),
            'updated_at'            => $this->integer(),

            'type'                  => $this->string(20)->comment('Import type (csv, xml)'),

            'name'                  => $this->string(255)->comment('Name'),
            'description'           => $this->text()->comment('description'),

            'component'             => $this->string(255)->notNull(),
            'component_settings'    => $this->text(),

        ], $tableOptions);

        $this->createIndex('updated_by', '{{%import_task}}', 'updated_by');
        $this->createIndex('created_by', '{{%import_task}}', 'created_by');
        $this->createIndex('created_at', '{{%import_task}}', 'created_at');
        $this->createIndex('updated_at', '{{%import_task}}', 'updated_at');

        $this->createIndex('name', '{{%import_task}}', 'name');

        $this->execute("ALTER TABLE {{%import_task}} COMMENT = 'Tasks for import';");

        $this->addForeignKey(
            'import_task__created_by', "{{%import_task}}",
            'created_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'import_task__updated_by', "{{%import_task}}",
            'updated_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey("import_task__created_by", "{{%import_task}}");
        $this->dropForeignKey("import_task__updated_by", "{{%import_task}}");

        $this->dropTable("{{%import_task}}");
    }
}