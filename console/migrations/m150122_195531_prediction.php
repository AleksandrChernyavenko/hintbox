<?php

use yii\db\Schema;
use yii\db\Migration;

class m150122_195531_prediction extends Migration
{
    const TABLE = '{{%prediction}}';

    public function up()
    {
        $this->createTable(self::TABLE,
            [
                'id'=>Schema::TYPE_PK,
                'text' => Schema::TYPE_STRING . '(255) NOT NULL',
            ]
        );
    }

    public function down()
    {
        $this->dropTable(self::TABLE);
    }
}
