@echo off
echo ===================================================
echo Starting Sportify (PHP + MariaDB)
echo ===================================================
wsl -u root -d Ubuntu service mariadb start
echo MariaDB service started.
echo Opening browser at http://localhost:8000 ...
start http://localhost:8000
echo PHP Web Server is listening on http://localhost:8000 (Press Ctrl+C to stop)
wsl -d Ubuntu php -S 0.0.0.0:8000 -t /mnt/c/Users/zoya_/Downloads/Sportify
