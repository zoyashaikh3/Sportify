@echo off
echo ===================================================
echo Starting Sportify (PHP + MariaDB)
echo ===================================================
wsl -u root -d Ubuntu service mariadb start
echo MariaDB service started.
echo Opening browser at http://localhost:8080 ...
start http://localhost:8080
echo PHP Web Server is listening on http://localhost:8080 (Press Ctrl+C to stop)
wsl -d Ubuntu php -S 0.0.0.0:8080 -t /mnt/c/Sportify
