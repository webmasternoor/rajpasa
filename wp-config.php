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
define('DB_NAME', 'rajpasa');

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
define('AUTH_KEY',         'UB_#yjgQHu@H;-B&yd:4KC*pw.6n#aTRz_|5>]x)#&DOMNpGncR#^]<.Wn.6rF.U');
define('SECURE_AUTH_KEY',  'j3BX-&TJp6=dk7.Ho^#dF4htgMysv^#Um&-??WZ.oumsbY}s+U-s)Y+fFaR(7eM-');
define('LOGGED_IN_KEY',    '14W(RpyiGf<uf1queHB3g?n/Er#ww/*0O- b9TnG U0&3gakY4>p.1Me#h-V%`cw');
define('NONCE_KEY',        '7h`;w$4*U9(-aBwiYCTS7OYsd|J{Jb!B-]x+X!o_NMMOLg1mRo|Op}k<# X>v[N/');
define('AUTH_SALT',        'c?s0T:v%3*zgniBYacMO|sM*PR]F,62T%5T:[.Qjq> +Q*){oW}}YeQ4z5E/D)-z');
define('SECURE_AUTH_SALT', '`l8I3U=N!Mu#$bs`g:)3eSZ?ZID]7)59p&zP%:I@>6#8=Eyv9n OR}c=Y`Ayg$vr');
define('LOGGED_IN_SALT',   'x1*?kmCIZ]*wG/lVaP)LN>myC{GO6_%Rrbi9f1vs*W78zvz`Zek?3/r_H2XmEc0;');
define('NONCE_SALT',       'R3Re&6KS?WZf58{&;{-e->j0>[kk`t>sc#2o]Ada-e6Y9:GjmR,!|uOq6ox%KEHe');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rajpasa_';

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
