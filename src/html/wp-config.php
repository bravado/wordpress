<?php

/** Container defaults */
define('WP_ROOT_URL', "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}");
define('WP_HOME', "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}" );
define('WP_SITEURL', WP_HOME.'/wordpress');
define('WP_CONTENT_DIR', __DIR__ . '/wp-content' );
define('WP_CONTENT_URL', WP_HOME . "/wp-content" );
define('WPMU_PLUGIN_DIR', __DIR__ . '/mu-plugins');
define('WPMU_PLUGIN_URL', WP_HOME . '/mu-plugins');

define('FS_METHOD', 'direct');
define('DISABLE_WP_CRON', false);

require WP_CONTENT_DIR.'/wp-config-salts.php';

require dirname(__DIR__).'/wp-config-database.php';

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
