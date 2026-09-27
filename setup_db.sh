#!/bin/bash
set -e
service mariadb start
mariadb -e "CREATE DATABASE IF NOT EXISTS sportify_db;"
mariadb -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '';"
mariadb -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION;"
mariadb -e "FLUSH PRIVILEGES;"
mariadb sportify_db < /mnt/c/Users/zoya_/Downloads/Sportify/sportify_db.sql
echo "Database initialized successfully!"
