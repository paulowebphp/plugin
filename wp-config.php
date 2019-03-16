<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'db_plugin' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'BR+c<{/0q7~.dvJWgIR}KY/AoWBDmkroW`8el&s+^`Kw>UcQu5?jfuoUapsf4a/ ' );
define( 'SECURE_AUTH_KEY',  'S[!Fj>W?_wi?qF2o+k%c>-vDFTmtP:,U*P&TB;TC=]@Xsc9(j/od;*B/gmApYP4/' );
define( 'LOGGED_IN_KEY',    ' PF`VK ^;V;oMt GEJnzoLWO1rW;wK787oRoZ:EW01`zF7E$5{gp>Z4zs{~Qj_{L' );
define( 'NONCE_KEY',        '^eoOK;/|,%ky8%rhVcB-W34|cn@|hR+GF]/%+S=o:/G2^Xd*|O^-r$=W%N9F_HSL' );
define( 'AUTH_SALT',        '-uvt2|t&Okt-@)DoBmAy:,;`bTv#`9!c[6L*=NQr$?.RYf!xGWqho ax=tB_(z_>' );
define( 'SECURE_AUTH_SALT', 'j9VK</lK5:ngHlNb4G2.Ex>X/lh9tf3h:bVQ_(divOEHDm6&2a~4dh[=n2.chpf_' );
define( 'LOGGED_IN_SALT',   '_|2LK=)xz7:~^@v<e1IH)[6AV;/J}T9KlML;Tb>D5Zglwc7?yfd?$~qq22_f*zW}' );
define( 'NONCE_SALT',       'G3#N-)r_yO7bC(NVevL8U2u:isLlJ??-$%2:<2%7QUPO/Cj-w8o^%CZ0qH^fV~8#' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
