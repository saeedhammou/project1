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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'project11' );

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
define( 'AUTH_KEY',         '`0k0V 87%4=9^{$7]FpEk.16f7iQrfC(:~|UAt6&8xEzQNMY]S<M= ,JY/I0u=fA' );
define( 'SECURE_AUTH_KEY',  'Yr3WCN%^|gwa20R c?;;?WuG@x4yM:HXyNrZ>KQw&iSF`u{f%F1%o2.e{.YKr=Dk' );
define( 'LOGGED_IN_KEY',    'a~mK.ZC+N<yOPI+*f]t0=i)Zphq k}AsmN-%7/wj=JQCgHLl.!iPH4!DL/uvvX%?' );
define( 'NONCE_KEY',        'vQP@OyeWFUK%%bDhHznS[+BJ|XFL>4jobp73p1QHfkR}+G.I>c[YZpr~JO]Qb@wT' );
define( 'AUTH_SALT',        ',9Me-sdHMlXXMnXCHJv40~oDM#J+1D)Sw.150MjuE/Y }-QpT~!EmH~wC#bSt-i<' );
define( 'SECURE_AUTH_SALT', '_a~r9([q8Z`!!q`3%w?=Dw8k#9;I]E-SwEF2C:<0|]>C} ]TquSNK8IL+1t4Z%d<' );
define( 'LOGGED_IN_SALT',   'ldgxbr%uugr;WW@qkYjBIz Khsdr^4^9p(2>.CH3J9ioojfB8Hg8`y-Sx?4.bH`2' );
define( 'NONCE_SALT',       '1?UTBIq,+3V1moxa5MOTsS7LEl<24RN].V$o:ku/QG5?k$[8o3+Aj IXutxtq2z{' );

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
