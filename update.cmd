set PHPBIN=c:\xampp\php\php.exe
if /i '%1%'=='dev' (
set COMPOSER_DEV_PARAM=
) else (
set COMPOSER_DEV_PARAM=--no-dev
)
powershell -command "& { $client = New-Object System.Net.WebClient; $url = 'https://getcomposer.org/composer.phar'; $path = '.\composer.phar'; $client.DownloadFile($url, $path); }"
%PHPBIN% .\composer.phar update %COMPOSER_DEV_PARAM%
%PHPBIN% .\composer.phar install %COMPOSER_DEV_PARAM%
%PHPBIN% .\composer.phar dumpautoload -o
del .\composer.phar