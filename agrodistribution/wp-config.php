<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'Agro Distribution');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&FQ?wUV1<x;}~#I|;goCLRKzJd*i(/]_Uhg-S40|FhCO29X}(/Pyo&reExw#f,ao');
define('SECURE_AUTH_KEY',  '-^!a.^3}+/BN#(m:qN;C4 [U7+IF#PbTjnn9#B3E]@N^<T[Nw}YrWY{>3U.6!fDh');
define('LOGGED_IN_KEY',    '7:v.SUFZHL5g?h1gd5/N(O(G}xx4(v@Cc0&L)o>uR)0lP/awso.aEpn#7t@1Lqp$');
define('NONCE_KEY',        'i9m4%z|-]$r3H/;X{c_^+Sj+9;e2LgN$}Q(]p}~Jb,t~sFxBF;9x|&h *j}ktJF1');
define('AUTH_SALT',        'gy3n@Z2c7gMORSbu2dVpMv()Z2_$j#*(u=W,[T) DU{{0P[L-pR&p9}VG=IVU8X2');
define('SECURE_AUTH_SALT', '>k({c;Ak3ul6R<8Iz%m:9,-_P!Q/Ewgbi>$D*uZL^4)~s@r{7|)DF[bMX99L#yTa');
define('LOGGED_IN_SALT',   'Jd3L40e4Pw0 ?lcw%gB|DRxVrJj;5po-=q x-P]oHyBqZhJb}KEbrhfA^_8XB,:T');
define('NONCE_SALT',       '|N<XHk>ETza1IyosKD>|aoErSq6xWE#:K{?w%W#g9SwG(_^ex(_WNhfkw{}*1g_L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
