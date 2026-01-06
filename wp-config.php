<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i2upw_x7465548' );

/** Database username */
define( 'DB_USER', 'i2upw_bt355ek5' );

/** Database password */
define( 'DB_PASSWORD', 'kfDDlgnlari-41E' );

/** Database hostname */
define( 'DB_HOST', 'mysql24.conoha.ne.jp' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'xJ*/zq9EG!.h=1Tnt[H%?Tn<n8.(3o<=i>#(Z4G_:sONd){}Rhg{ZQv^>4_`<7G)' );
define( 'SECURE_AUTH_KEY',   'q)Jp-=E=?&}<u?bu^woc216AQ]j7:yI13Rb`Q:`Ol&5b!3cvk[XLgI8:gqO|LNC;' );
define( 'LOGGED_IN_KEY',     'P:w*XU/6cm-$UaJ@66$(NQBJ?`(i,nWdUB?{o0mTNw~~=Pz(DTN-ONY%U?0<.hd`' );
define( 'NONCE_KEY',         ';))kvw|N&qqyuYi_hri*(-nT2[$`B6lT,DbHk:am6%5NYpaYbFSbk.7!><S~QHfp' );
define( 'AUTH_SALT',         'Oa/AY+t?bu3VjH}i{ 6h$Kqd1,/Migu3rw.(ma`U- w^F#ZX]i-/Sf<4do2=`C@l' );
define( 'SECURE_AUTH_SALT',  '%U1Xfi5J{yt0~r;)oH<?/a%@Ol>Q<$W51V=SaU`S_Z0i1?T/y!AYa,$@[RXlY3>%' );
define( 'LOGGED_IN_SALT',    'dV*hZQSGur53vP5Td0ea(L!ef3W96^8jxHDDVW7K/,wN$UisS%kU_Q96rx95ee%R' );
define( 'NONCE_SALT',        'd!TIBDAkvb>2QIXU64UCY$8]hu0 #1]l9)9+ 1/9]-UW%W*z/~Hc!z[3YPL*UH+e' );
define( 'WP_CACHE_KEY_SALT', '?JK/f;mtg)27v49Oe)T~rmEB2TC`x8tg[&CO37%XjzBljD$D|Sr71U*|y<pjz(]`' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

// SSL証明書設定前の一時的な対応：HTTPを強制
$_SERVER['HTTPS'] = 'off';
define('FORCE_SSL_LOGIN', false);
define('FORCE_SSL_ADMIN', false);

// 元の設定（SSL証明書設定後にコメントアウトを外してください）
// if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
//     $_SERVER['HTTPS'] = 'on';
//     define('FORCE_SSL_LOGIN', true);
//     define('FORCE_SSL_ADMIN', true);
// }


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'CW_DASHBOARD_PLUGIN_SID', 'U3kmliHE9y8vMWkAEcGoAKBOgGQbQN8o7oeTV_RLd5vFFCfSVSdsT1TetBwVZnfw3jJpiy-Rj-WGKGMVk85Czu95zWE-NRGGQ4GTIo3L_0I.' );
define( 'CW_DASHBOARD_PLUGIN_DID', '0fyqXxw3ARaMw8eDQ7SQvSqwu6ryBwTSQwuhKbn13diQ5K5HtlDUnv7dQgILEZhwcZ-QEJgMmqfTtdNPqWWjhW3YdNpOxDJGBzEbZNmq3lQ.' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
