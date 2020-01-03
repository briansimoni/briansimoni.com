cd /var/www/html/wp-content/themes
chown -R ec2-user:apache simoni
find . -type f -exec chmod 644 {} +
find . -type d -exec chmod 755 {} +