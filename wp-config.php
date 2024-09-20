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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbykj7asxxgrni' );

/** Database username */
define( 'DB_USER', 'ujby57lhogtgv' );

/** Database password */
define( 'DB_PASSWORD', 'lgatv0zugszv' );

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
define( 'AUTH_KEY',         'jDxY_q7Fl[,oQF$X+OIA#ubHF4}sy1J]f*,#,TEbI9a=;#T7^Z`=}UMyLXIOcCF4' );
define( 'SECURE_AUTH_KEY',  '0C6T< `-?DB,0Z=;_*2!@mmD4Jji62>=?YNG`B5^_*S@Ve%%@M1NYB!aN/Wn#xaO' );
define( 'LOGGED_IN_KEY',    '}#MUfYN%#]5#Cgx/A78zR]g]4@FtmJ(IVu.0r2JUL.[$)J.~!cPD92@fO6wV)7:T' );
define( 'NONCE_KEY',        'D{t,8dX#.Uq6@-Pf<bWO>+;%2ppHCF^Pw4j4/EV=XW*]bj~(V_;^=~!+r|&98O6G' );
define( 'AUTH_SALT',        'lSzVXV)]7cdVk^O^*P*>1A8o2oTXXH?3o9:X}HsVCm*1O!E}vBINN$)$Pq,Ji^H%' );
define( 'SECURE_AUTH_SALT', '?-qgMVxS<2Nva:w~Umyt!N%0y*x0alkqZb8&b){x2VF#!Khz`(Swg>r b@/G,!X4' );
define( 'LOGGED_IN_SALT',   '4V!~8rTgPsCY[Ugp|lJ^jx$,BM+yj1KEAy6LJD?$6,Bh*t=&},f4p`B?xHWo)<.!' );
define( 'NONCE_SALT',       '0FvH{S bs>zo.8JRr0[7~#QPu8% PfzASHz*XMbQuusei$IOY)[LmML9{mG2Xg:s' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
