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
define('DB_NAME', 'test');

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
define('AUTH_KEY',         '()1*!NAdUo$@#y)bqc#jLyJj+Wt8PV0^1M:qgFc60fIUK--qs-s`Sqgcf*18_qaX');
define('SECURE_AUTH_KEY',  ':?#uZo97}D)@TPhYl%5(N4);lnp7Im)owx:eOh`;YWHU<bYO[!jJVQ;JyeBb)Oay');
define('LOGGED_IN_KEY',    'VD)0l|tV(;z|TL)3Su )6E6n<3g#BuxgZ5rY8wtnDvcqmAOT`_#c!.! C|G)X2<5');
define('NONCE_KEY',        'x59E5}CZjT#|jH?1Mox!*20i0)BCJ`4RK&))rn1=.fGy>u`AfRo<m& GTiWQ^d&f');
define('AUTH_SALT',        '0}48fSyN}BH~k?ZW^?c4 ys|sC;m<gvDnKwe85u]=Lh>GebG;6#iz?GB-CI9vF7`');
define('SECURE_AUTH_SALT', 'RZc9SqE0<5U68<X,yn4LMU/erx2!?5<Igy.9g0;e~UrYTPzm%-j0zDGS9eUr4|L#');
define('LOGGED_IN_SALT',   '[~VxVY^h!`1hVWk)Ou%]l6q)2o!:Q/<*XnNZ-pX6J5J>;Kr>QoS.:+)U(LY&P[nP');
define('NONCE_SALT',       'i;4_g8[#Ye-_EG2x(B*yGG+{Cmy+STx1B:LB!n_/=6w%Y^*9#YA<q28BP$h*BRV$');

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