<?php

define('WP_USE_THEMES', true);

if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
       $_SERVER['HTTPS']='on';


/* Load wordpress */
require('./wordpress/wp-blog-header.php');
