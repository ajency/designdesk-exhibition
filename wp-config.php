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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'designdesk' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '3S)TN44rOW?j(K4rl1?obA^Eel8JjXb/0&[lND#{354`W}q/i#/DHis/tj2w*).3' );
define( 'SECURE_AUTH_KEY',  ')O*<%8~}4P6uBH1k~&89K8zdf~GP1t:&Wa~4NNF(zrcx7(to4 cu|#{5)#V26vv-' );
define( 'LOGGED_IN_KEY',    '=gHz@>e]HkU>}_<40_QSv)Bv5F.6cg9?1KNHQ<tu&~hC(GOy97{4(<`0[9iA3|i]' );
define( 'NONCE_KEY',        '&33.(~FcG0>[(J0/HH?x_}KjKtHb6-Pixzg*p8v:Ro5a~/4@#Gitl(pf.YG_Zd-#' );
define( 'AUTH_SALT',        'kJkf3zku(7M wTC|g(UBEW6EdR)0D|&hNEXFkU8[8Y6`zg#g(l9^K9,M,ryTA$=x' );
define( 'SECURE_AUTH_SALT', '?$3XS,!#nqH^||-^#`eF7v7@CR:-7Wm4n:du(Y>/Ee`^A2G>^h@470/Q,4@&arVh' );
define( 'LOGGED_IN_SALT',   'vn[~l>]OCeYltxQ}OD:-rLx%rP~6h9U94m@(4)VRkR`j79v;+$MJ&8{rOb}9>fzj' );
define( 'NONCE_SALT',       '_{+2U%>E5$:09==-k8,jqNXz!C5+i0 8uJFAjL[X-(tkp{Sw8,6COn;JEDe;%ng{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
