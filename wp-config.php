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
define('DB_NAME', 'sankofa-family');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Sankofa809');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'Mzn. @MQH^@yZIbV%ck$+1pGKW!EaA~t3@ohn(br)3+K)?b;bY$U_n*mAESrrVYl');
define('SECURE_AUTH_KEY',  '4~yD_.q9BL%dAc[t<o <##$@.w]Yk0*+k(+Z0I3#F+r3Hqeb.7%5[X1FYIR3W-<.');
define('LOGGED_IN_KEY',    'z&?USM1B?3m>g`:coot4E,A;c8Q?P7 {}uRs?HH4F]H=g,4 |Y88tYIcUP.jaOxj');
define('NONCE_KEY',        '{6op.rgU&T071Mh_<~IMOyYJGZ>sL^66CeE*]TlQ:,)LPx8dZA>N#CV`DGO1@Y}/');
define('AUTH_SALT',        'bmCU7.=CohG7#8TkbV CjRG/a/&)/,8nD,M5CRi`9jxb1C6-i?3 u%UOHAz:d B3');
define('SECURE_AUTH_SALT', 'i7X(:eKIUcuvk._a5,&M+d|bOzYh8F7s]}Sc6-$fJ>?L{hv!CLMvyXc/yOO~r|04');
define('LOGGED_IN_SALT',   ';|v^~D!7>N6E4s$qe{I11:b-n)k@_Vg#;mHy~r`[}0>LImx,UWazb0HIEO#oMIOc');
define('NONCE_SALT',       'j/:Fc/jUrtDqcor}522)_hs%&-bjpt[wF<y3080KR`-,b]IE.y30_ [aOT&-1X.`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sf_';

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
