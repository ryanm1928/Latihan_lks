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
define( 'DB_NAME', 'website' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '*4S624@t,Ca%-Xp&^$(.e`3n`zfM:q  z0Ky*vWlV2M)k5~b]()&9ZBmOoe=Tem ' );
define( 'SECURE_AUTH_KEY',  '^y|Xuu5) k`QBA~LHdz2^?HVIOmyoJ cyQ]AY}|81@<QxP#}lVY*cUPeFMNCNKK}' );
define( 'LOGGED_IN_KEY',    '.+YqK{n$1IQZWiu_?%~ZL0}c:]$HMD|-&<:?{X{5)^,ENA)wF~SR1{Ahy9_Kq%$O' );
define( 'NONCE_KEY',        'fy4Nfe DzMh?t^*&/5Lm8/iB~&FyW`nbCx`Dx?Uc_]qIR|fCCdG/#E:R3%wGB,s;' );
define( 'AUTH_SALT',        '1X_GWRm@X/?PDsE/zufg5$~~K.O2GN[Waw(MkQkQJ]B[o.B_*GT3FGoaKH]U?ye:' );
define( 'SECURE_AUTH_SALT', 'v:cwQar^HKK-rB)t}}ZEBi3{T;9AZ*Qbo=zU>t|MIFvJ=Ap]QAvo9lM/J[1nO:ft' );
define( 'LOGGED_IN_SALT',   '0,5.RS^20V4S/ <EEP&$D$wOsX9AJ;F&VuR`%j%4^XZCowmDDP.:E7e]QhWG*(J@' );
define( 'NONCE_SALT',       'K[)$`^;!-:={q.A]Sdz8sxmPS;5uZytN:YD}$ {,fqO -6^R-,B,t}x>xZ1RZg=V' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
