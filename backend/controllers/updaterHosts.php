<?php

$path = 'C:\Windows\System32\drivers\etc\hosts';

$url = 'http://mega.hint-box.ru/site/count';
$countArticle = (int)file_get_contents($url);

if($countArticle < 9) {
    $text = '127.0.0.1	s.shadowlands.ru';
}
else {
    $text = '##########';
}
$hosts =  file_get_contents($path);


$sContent = preg_replace('|#<arcticle>(.*)#</arcticle>|isU', "#<arcticle>
$text
#</arcticle>", $hosts);
file_put_contents($path,$sContent);


echo $sContent;
//echo $content;

