

# Fix permissions
chown app:${APACHE_RUN_GROUP} /var/www/html/wp-content


cat << EOF > /var/www/wp-config-database.php
<?php

define('DB_NAME',       '${WP_DB_NAME}');
define('DB_USER',       '${WP_DB_USER}');
define('DB_PASSWORD',   '${WP_DB_PASSWORD}');
define('DB_HOST',       '${WP_DB_HOST}');
define('DB_CHARSET',    '${WP_DB_CHARSET}');
define('DB_COLLATE',    '${WP_DB_COLLATE}');

EOF

[[ -f /var/www/html/wp-content/wp-config-salts.php ]] || ( \
  echo '<?php' && \
  curl -L https://api.wordpress.org/secret-key/1.1/
) > /var/www/html/wp-content/wp-config-salts.php

chown app:${APACHE_RUN_GROUP} /var/www/html/wp-content/wp-config-salts.php
chmod 0640 /var/www/html/wp-content/wp-config-salts.php
chmod 0770 /var/www/html/wp-content
