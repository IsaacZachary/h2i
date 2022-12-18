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
define( 'DB_NAME', 'humblecrib' );

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
define( 'AUTH_KEY',         '5!osiEqm[`E0[:>QQ)PPnPBvIQ.$COL8Un}~hjUheLe)hdT^-JkSBgs^xFp_i=u4' );
define( 'SECURE_AUTH_KEY',  ':@UArwIwEaT*meu@:^hqn@?#Z&2h<G pXQhHuw+]~Ocs6~VH{]6 w4=ZFppFkeWl' );
define( 'LOGGED_IN_KEY',    ',9z:g5/XYXV%G+C?+(l*,3sQtlSUT+KB3Xc3}i`4%~`a1-qAw,d^7xfr9Y3Xl5=(' );
define( 'NONCE_KEY',        ',8xuM%x@3g?fGu*o56 c`O-*5Z5;`CF/ghXRE|H)&W`&$LmQ+s;*]fyTlOK$/mRn' );
define( 'AUTH_SALT',        'eTR_aH5,.|5K0*y/14@@eLMY#t<+c{S#z|o5nR5r>u2~RRf!vYcz|?CGK (o#f-}' );
define( 'SECURE_AUTH_SALT', '~GSEO?EmS{1)^$hEFwuQTE}YhpyZ,mC4vJ&`>_TAZAI~p~Hur#neqpKW@e2NV9Mg' );
define( 'LOGGED_IN_SALT',   'MGJkRQenA$=9GH?0 }@UHRXGL4c(k]J(j_Lu|Q4y=LuSSYhndivz y$*F;;quP_%' );
define( 'NONCE_SALT',       '4NkHL>3Y#K5IK;4CqT27;Ed4OaltXs%kN!*};hz2yzmbycRx(@#2~3qDgUbi$+~E' );

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
