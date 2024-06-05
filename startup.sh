#!/bin/bash

echo "Copying custom nginx.conf over to /etc/nginx/sites-available/default"

NGINX_CONF=/home/site/wwwroot/nginx.conf

if [ -f "$NGINX_CONF" ]; then
    cp /home/site/wwwroot/nginx.conf /etc/nginx/sites-available/default
    service nginx reload
else
    echo "File does not exist, skipping cp."
fi

# Start PHP-FPM
service php8.2-fpm start
