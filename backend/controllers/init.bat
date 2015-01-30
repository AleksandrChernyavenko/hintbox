@echo on


@setlocal

set PHP_COMMAND="D:\www\Winginx\php54\php.exe -f D:\www\hintbox\backend\controllers\updaterHosts.php ";

"%PHP_COMMAND%" %*

@endlocal
