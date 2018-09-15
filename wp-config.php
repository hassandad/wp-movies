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
define('DB_NAME', 'wp-movies');

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
define('AUTH_KEY',         'CTwbFsy1RZw[m*Ogy$h%`yw.71eEbbHnOhM=<O~@sx]G9&_X:cLGW^~Svt<&-36K');
define('SECURE_AUTH_KEY',  'NV~:;$*>n^.!+=ka1$Us8+2swA%?:Q8B,UbwuRq}V)goW}@gy6Ox@uAAObEb 46,');
define('LOGGED_IN_KEY',    '8#ELMV^3aV(jPa:A&S7DA]0_|<AFOXS;DX1jaXz=suA(8,,lAqp5wa<B3@Opp4wp');
define('NONCE_KEY',        'zx6?7,FyUzhh`_1W71|7*#&DMWI[L>V!1pee>ay>&(UN*q*oxVca8Aq<4/M#ROp`');
define('AUTH_SALT',        '<AC9Ob}_H!pF:25 6Mz[80?p)jpQt~{oM@9IH;p()Sdk@|h`2AzJ^^=GF:Ju$%3H');
define('SECURE_AUTH_SALT', '6rtjHB,W&U wJKb0AI`XK5~6a-LrB;Pq0+KBIOB;kps#egNWco@!R-p6?(l8]([b');
define('LOGGED_IN_SALT',   'p@2V.@l%)x:w~RfqtR1$LO@YFtr6)D,+x7(4<UcP&q:Lw$^);FUrX0#kY9p|`jlO');
define('NONCE_SALT',       '}SW!:?a=[?:OpR9/Q{HNW,nYGcR2qUm{3XY^1h?NVS!B40<+QgW+@_kW7h04>E7F');

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
