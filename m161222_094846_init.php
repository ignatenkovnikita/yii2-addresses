<?php

use yii\db\Migration;

class m161222_094846_init extends Migration
{
    public $tableName = 'address';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'json' => $this->text()
        ]);
    }

    public function down()
    {
        $this->dropTable($this->createTable());
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}