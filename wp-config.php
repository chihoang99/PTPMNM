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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'chihoang' );

/** MySQL database password */
define( 'DB_PASSWORD', '123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's+z~-&<4SEvf,N]zMOrb1s{X}lTMq=3ChwxT<$WArbXsbcBViRx>2Dc5Pr+KNFk0' );
define( 'SECURE_AUTH_KEY',  '[wej?(c~#2c,!Djs9WHw|gw]tYS0hff]f6$R.XN,n4{5XI=mVf/y8uQg@AXRIN.x' );
define( 'LOGGED_IN_KEY',    'eS*Y9k@)u<`O,:r~uB:TnA:>:t[K4[TVdfWxWV@a:U@aLEumuU[za%jm:Mvp:]C;' );
define( 'NONCE_KEY',        'KYtE=3!2[P#BH!3&m$$?tYF9+E8H<ur:atk=2CFltbW)T>/z^Ect]S^}7~IX^UK6' );
define( 'AUTH_SALT',        'C$$[mn? Ul;80v9rp1aeR6]NY0Q,F2VeIh67q+(aV+b0P1+QP-5/>-0B+&cl@dId' );
define( 'SECURE_AUTH_SALT', 'E$4Fl,x3bGt&uWwv*gti~;Itv| I}}RnHqsIv!W)[+Wz $(Ue^BDeh,>17T|+_`B' );
define( 'LOGGED_IN_SALT',   '+dyIUDQu2Pq2Emv`x;(v;nQ:Vo{Nfq`h`eB&Y>cH,zj1d0!M5%f|pHXo;Wv KA,1' );
define( 'NONCE_SALT',       'nGyn0Sqo<!5d4u63yCuj_ IF6NQVaAZh4BXk*23+ *,9}HJ y*oaq`il9JF=w2yS' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
