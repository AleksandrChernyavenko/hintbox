#!/bin/sh

echo
echo "**** Запуск скрипта обновления ****"
echo


echo
echo "**** git fetch --all ****"
echo
git fetch --all

echo
echo "**** git reset --hard origin/master ****"
echo
git reset --hard origin/master


echo
echo "**** git reset --hard HEAD ****"
echo
git reset --hard HEAD


echo
echo "**** git pull ****"
echo
git pull

./composer.phar install



