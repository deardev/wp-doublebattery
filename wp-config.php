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
define('DB_NAME', 'doubatdb');

/** MySQL database username */
define('DB_USER', 'dearshivauser1');

/** MySQL database password */
define('DB_PASSWORD', 'dear#shiva#user1');

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
define('AUTH_KEY',         '~hg^-<yfNP#S5q,-#A$!9fR|`pr_OKE!n:EBSP=ko{+lruf8Wh%C-WKj8OFYI8Cr');
define('SECURE_AUTH_KEY',  '836IR_B36f7GXBsImb9jenyMpuwN0? ;rk80H:=LOaO7UguU1ysbi[_o-iWu-4N[');
define('LOGGED_IN_KEY',    ',,zd4$<40Gi6]x:c)*(Y2^_;IT#>9#3S7Ezh81/#Ea_lOXs;7l@L#o])Gf>Z%_(2');
define('NONCE_KEY',        '>LcDay5]s^*_%K{H/@2u86RP,~/gNd.!*Vbo-&d^W]XN>Za&lTVFpg$#&NJ9FL+;');
define('AUTH_SALT',        'V7ezm]%`v]zBeiz[Sbg4?h{mR321+s+Bdr79;YC%Um=~<E*<}m[7A3IZJ+XF,|V-');
define('SECURE_AUTH_SALT', '?t(*{kEQAD?eD?98S5z8!9._ke1YQ_nGkSdrNjOEd$z^Pc8|t[Ojqnj(]0sGp,@|');
define('LOGGED_IN_SALT',   'e9VVGo%/i;TWl7XaKY;8f%=~sjR-tQ:EvY9t7d5OgK+Xzu}8KXT/0-!T*>&OozOo');
define('NONCE_SALT',       ',_z9_yZ5mAMuI-6JJjdTJW)]wc-H(}9$;NW)0XniMRt9NDm,1Ft#aL7(b.l>GOMm');

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
