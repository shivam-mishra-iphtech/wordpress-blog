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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '[!t:2cQ0l*VCgKm?io5H /)M%D`PWl4$@=c,*XtI:K)$({~nWT>OV.yW3|CBR|m7' );
define( 'SECURE_AUTH_KEY',  '-M&Q}v$C@2;tV!0X=*17fL[TJwl*tV(Ro,aK0`]/ leOBYmZd0T6Gx2&e)+9:zg2' );
define( 'LOGGED_IN_KEY',    'K=kPGIIxL,3(,r$z=VKXy*H?|?U{Y[r7h~0M?`3[7aVke9&J1RP5W,CaBQzr+4+@' );
define( 'NONCE_KEY',        'a!7MdSMVP3E1]KwXi]`:Roq4Ds&)~~JXextYEjT;ON^lEDlIn!(!2}aKjBBQoE{8' );
define( 'AUTH_SALT',        'o?c]LJR/Py]4i!=GRpE1@|UVu<iLhyi%AktHR $~<B.fWBUf|&:|]U4Zf(}[>3Gy' );
define( 'SECURE_AUTH_SALT', '.C-C>8%7n13:,iV`Rl~Y>Rc;q$CwMzh#h^s=TvpK=)2mz{=z?.-/Q[+JeP63{DN)' );
define( 'LOGGED_IN_SALT',   'ABr!V2auSyrl2.7 t?_NLCDc.^En?8f-uyWz[9kF%A]>![0!Ch;pLI3y>=y(?aZT' );
define( 'NONCE_SALT',       '`xN#AC}S^H>@xx}k5oT|8#*c5|2W{gg]L:!i<QavD`!F79o:r`iF{?7&DU,*O}bI' );

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
define('FS_METHOD', 'direct');
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
