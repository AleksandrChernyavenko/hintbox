<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 01.12.2014
 * Time: 10:14
 */

namespace console\controllers;

use yii\helpers\Console;
use yii\helpers\VarDumper;

/**
 * запускаем для миграции на новый сайт (меняем бд, картинки и т.п. )
 * Class ToNewSiteMigrateController
 * @package console\controllers
 */
class ToNewSiteMigrateController extends \yii\console\Controller
{
    public function actionIndex()
    {
        $options = [
            1=>'Запустить полную миграцию( не запускалось ранее)',
            2=>'Обновить БД',
            3=>'Скопировать картинки',
        ];

        $userSelect = $this->select('Что будем делать ?',$options);

        $this->stdout('Вы выбрали варинт '.$userSelect.PHP_EOL, Console::FG_GREEN, Console::UNDERLINE);

        $this->stdout('Переходим к выполнению действия '.$options[$userSelect].PHP_EOL, Console::FG_YELLOW, Console::BOLD);

        switch($userSelect)
        {
            case(1):
                $this->replaceArticleContentImageLink();
                break;
            case(2):
                $this->replaceArticleContentImageLink();
                break;
            case(3):
                break;
        }



        echo $userSelect;
        exit;
    }


    private function replaceArticleContentImageLink()
    {
        $this->stdout('обновляем ссылки на картинки в базе '.PHP_EOL, Console::FG_YELLOW, Console::UNDERLINE);

        $host = \Yii::$app->staticUrlManager->baseUrl;

        $this->stdout('Будет использован хост = '.$host.PHP_EOL, Console::FG_YELLOW, Console::ITALIC);

        $sql = <<<SQL
UPDATE article SET content = REPLACE(content, 'src="/images', 'src="$host/images')
SQL;
;
        $result = \Yii::$app->getDb()->createCommand($sql)->execute();

        $this->msgInfo("Замен произведено {$result}");

        $sql = <<<SQL

UPDATE article SET content = REPLACE(content, 'src="http://hint-box.ru/images', 'src="$host/images')
SQL;
;
        $result = \Yii::$app->getDb()->createCommand($sql)->execute();

        $this->msgInfo("Замен произведено {$result}");

    }

    private function msgInfo($text)
    {
        echo PHP_EOL;
        $this->stdout($text.PHP_EOL, Console::FG_YELLOW, Console::ITALIC);
        echo PHP_EOL;
    }


}