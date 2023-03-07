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
define( 'DB_NAME', 'wp_kapps' );

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
define( 'AUTH_KEY',         'DBjJGXBy*dB*LHmHL|[sJC}/W{5|J3(&cQP#%1pZ{0Z4$Q?JJl,d]cAJ^p}o 3a=' );
define( 'SECURE_AUTH_KEY',  '$H(:1-`f**JjXoXSikd5(/~1$,+@iGq|Q-`&`)yW>q?86}u[{o$iC2IRsSOFVHWt' );
define( 'LOGGED_IN_KEY',    'IPUY,`&f8o}Eu%eIt=aF>c9/_d*ODuR=.P8X|H,-T&}DelyCy$ImeG`=u3/TYh`L' );
define( 'NONCE_KEY',        'uCMU}O(,SU,S^+M<}jp`G7JI>q{Nv qd)D!3H/Qe2U$-/}1/Pue71G40T8 O$1qh' );
define( 'AUTH_SALT',        'SGE%mZ_ZV?]4qr::M:W@~8y7$H$sRr_Rf/ XlLavg@ixin,lL6.)v[eT]3>$Y(cx' );
define( 'SECURE_AUTH_SALT', 'g,r+ybH9Xw ^w)~1_gGfj?Ma)^;?[L7oqKfo{v9jXw,-2sm0)PblsIcsS~(+tv$+' );
define( 'LOGGED_IN_SALT',   'V1#NjZE-0)N8HWg@7jqPLvXjv2)[zb].7J{=EI.wO?2>6i)2,/%O3+/eW9FU{9 _' );
define( 'NONCE_SALT',       'vzLh):B}d@5^+>}D#axv$M?YFG#2to9*(|XN)ZY2:O+0+I)XIv`kY<?ehoep#^*D' );

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
