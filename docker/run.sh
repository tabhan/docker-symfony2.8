#!/bin/bash
mkdir -p app/cache app/logs
touch app/logs/prod.log
touch app/logs/dev.log
chgrp -R www-data .
chmod -R g+w app/cache app/logs
source /etc/apache2/envvars
tail -F /var/log/apache2/* app/logs/prod.log app/logs/dev.log &
/project/app/console server:start
exec apache2 -D FOREGROUND