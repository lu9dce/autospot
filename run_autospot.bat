@echo off
start /min c:\php\php.exe -c extra\php-win.ini -S 0.0.0.0:80 -t web/
start /min c:\php\php.exe -c extra\php-win.ini newdx.php
