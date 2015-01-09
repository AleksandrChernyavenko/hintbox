<?php

use yii\db\Schema;
use yii\db\Migration;

class m150109_145255_similarArticle extends Migration
{
    const TABLE = '{{%similar_article}}';

    public function up()
    {
        $this->createTable(self::TABLE,
            [
                'id'=>Schema::TYPE_PK,
                'from_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'to_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            ]
        );

        $this->createIndex('from_id_to_id_idx',self::TABLE,'from_id,to_id',true);
        $this->createIndex('from_id_idx',self::TABLE,'from_id',true);
        $this->createIndex('to_id_idx',self::TABLE,'to_id',true);
    }

    public function down()
    {
        $this->dropTable(self::TABLE);
    }
}
