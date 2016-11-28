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
define('DB_NAME', 'citu');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'W-p`$XE~[Xw@@QxJ+[[}s|i=aR*(}-2WflUr}!*_|qKOAvZ{q9FegkIJSCh$q~d]');
define('SECURE_AUTH_KEY',  '=g+irI9>sy+Puw68#@Gfbs@IVh{vs:sdMU]{MXMT96D@LRunH3.!$84nb*V~r8T2');
define('LOGGED_IN_KEY',    'zfFdRR;W)^SVdb4TYUnv=a{R~@=Ch|K6G-^Rg/u@hfQK>rx6.`m~mfcqK3=G5oGr');
define('NONCE_KEY',        'gsttkhxq(+v1j*w ,|aHjK_IpOLWv4ef3V#Y1U~|MPzB[`w5o^q<QmT-|QR`|jxT');
define('AUTH_SALT',        '|s~sSub* =8f%KU}J6wjYqAH?#}N1w<DxM<W4TR0x)^%2cviq%0TA$blZM6D)M<s');
define('SECURE_AUTH_SALT', '_Jlna^Ex.j1958eY(RX>9Tcut62tIc4U`MFkJbl>:DG$j.Z:`<^X 9eB|a,sFbUK');
define('LOGGED_IN_SALT',   ',K!5w=#+h<y# 8HN/A/Mpy`e_Qzez&_Yep#nopf;_[:[s1;?R}1<bCk$oj@e_0B?');
define('NONCE_SALT',       'pJE{:rQE%IpRis];HB|kZ$>zW(?Q.j9<<-MLhF_aneG_9MQZBb7V=}:>[NXZEwvD');

/**#@-*/
define('FS_METHOD', 'direct');
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
