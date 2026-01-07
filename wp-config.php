<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

define('WP_HOME', 'https://bursarakyat.com');
define('WP_SITEURL', 'https://bursarakyat.com');

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'stockpulse' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'aditya202051056' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('DISABLE_WP_CRON', true);
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '256M');

define('FS_METHOD', 'direct');


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
define( 'AUTH_KEY',         'E(V+=x/)tAR6nW#D8<^+_e/e;aY?h44z(vR](uM6UL1B]??Wd?/T>M|@ujs0yBUz' );
define( 'SECURE_AUTH_KEY',  'ie@h]bo<!+nik^l;Hh@Nqgv-q5JPxWH~mVlhFl+2_!j@lf%EL!iThw,M?udh4H}L' );
define( 'LOGGED_IN_KEY',    'OoT.^+h~S)0gaGgtT.>tu/&Kaq~^tGOheF^$%s6:&;:~_l*km..?h5.;4?(F6Z_J' );
define( 'NONCE_KEY',        'i[isS(-VU<*R9|V9f& !`l.=(^vK^!>6j4cy}fT}6oh`FFv0|,y-Jc2%]$E&sS07' );
define( 'AUTH_SALT',        'J#vBW{+`H6<L4s&tGmfX^%<},[K@c0v|7<PK&+=8?@_Koy*AV4TOuhH;L]4Mdp`d' );
define( 'SECURE_AUTH_SALT', '8UrF63>/!]Hz#Q*.:mAB[3BJD@1&P(-d/<mG$e6{;{p&},0qLk}y4Ur7(xs: u%;' );
define( 'LOGGED_IN_SALT',   '!r|lD=] !6tWr,_qFAeFtCW{e2C2nO{$7BwrZk>/dKE^rK];&D2T=Syo]Tx<Z`>U' );
define( 'NONCE_SALT',       'gpp`;_uJdk<WFZGbGa{2^C~pnS<u=G})BHvtc@.ISr4qJK_y=yWDk_j-~(_AZ{[Q' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
