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
define('DB_NAME', 'ustec');

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
define('AUTH_KEY',         'c+~e;mzXz[m#I5EsZ?f&;Iz{`Ys$R8J5ApsG&D]4r*CQky6M+V4eSYx.XH JJEsK');
define('SECURE_AUTH_KEY',  'Kg1${@VpfD,X;[8-k]+UBARP,TV`v[E),6OSp{N{/V :;!e&IXiYHIoyd0_Su*!q');
define('LOGGED_IN_KEY',    '1#3^a^@K42?laJA~MZj|xM/EM3DNmfOeA~P#}M$il.L/Yk3!tLq]5EY|X8to:gXs');
define('NONCE_KEY',        'A--=Sc6q:Xe_owKZs;jw=f_.g~,+&|Tuc :2!1yToUfvx;m<.29F)(32I;-fq&){');
define('AUTH_SALT',        'ZlwAt<%g;C-)WNwox(<WYoUX~JQyezMQD0WjE/bo},BXZ7a*G0L10f)uoaKo(GI7');
define('SECURE_AUTH_SALT', 'Hmu$y3po^~^Xo!,S_A*Odt(y4Ew<F6oR/W%OUmc.$8kVYrbWA#3DbRVxU)e5=K-K');
define('LOGGED_IN_SALT',   'KZQ8VEHXd&TPybKX wWC>F9BU#!8,zW4RbaeEKK2Y>&sr9CK+`Z@~0R2c]#w,{=g');
define('NONCE_SALT',       '|Kz9Mn} -&l7ZQh+O+;r}:J$be}J$64Mv8Euts/%_H9e1]/wRK2[42KD}hBNj6{l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'us_';

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
