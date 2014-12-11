<?php

use yii\db\Schema;
use yii\db\Migration;

class m141211_123549_changeStatusArticleAndCategory extends Migration
{

    const TABLE_CATEGORY = 'category';
    const TABLE_ARTICLE = 'article';

    public function up()
    {
        $this->alterColumn(self::TABLE_CATEGORY, 'status',  'ENUM("active",  "deleted" ) NOT NULL DEFAULT  "active"' );
        $this->alterColumn(self::TABLE_ARTICLE, 'status',  "ENUM(  'active',  'deleted',  'archived',  'in_progress' )  NOT NULL DEFAULT  'archived'" );
    }

    public function down()
    {
        $this->alterColumn(self::TABLE_CATEGORY, 'status',  'ENUM("active",  "delete" ) NOT NULL DEFAULT  "active"' );
        $this->alterColumn(self::TABLE_ARTICLE, 'status',  "ENUM(  'active',  'delete',  'archive',  'in_progress' )  NOT NULL DEFAULT  'archive'" );
    }
}
