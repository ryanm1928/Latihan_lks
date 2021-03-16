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
define( 'DB_NAME', 'lks_wp' );

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
define( 'AUTH_KEY',         '7]z_hK|Zw-[!6[ Ho`bxEeN&S ghPee#JZ{y|u8O>{cHX0f,x}-iMD[tWi8lZ>q|' );
define( 'SECURE_AUTH_KEY',  '%+tNyZKQ8$Y(hePe;M4;J1}WDsF8U2Tbg#RZ2IkwNk}QP 5Rbmq71GXdV3Sb`@H(' );
define( 'LOGGED_IN_KEY',    'DGs)HTq^]pqQEk=Jfz964%xk:LV#}k.P8xf5}*#U8e&OUXu:hVQSfxySlbBz_#~y' );
define( 'NONCE_KEY',        'lUaMN4P]9a?(p;|*Ea;TaM|##*q_SO gq^dY$h_&,ZnlpB-/n}YlV(xk]g}>QHtP' );
define( 'AUTH_SALT',        'OL$1>sG0Zu1:ll0YSdH!7oq2nscI.]rk1eQEW8 rSbm:#k=hVrE$m@|w-DD#? 7%' );
define( 'SECURE_AUTH_SALT', '5Ton=tZO:1=rh+ALVc,W]:4ZgP*`?rcDigCN0T$Ctg~T($7ej}:;n#gqcP%{&bSv' );
define( 'LOGGED_IN_SALT',   'ZS9N7/h+/xnbE aSd6OJ4_0r1`|RBVKFaa47l >VGr([i+Dv[[y_&GZ;Z%VPq~>#' );
define( 'NONCE_SALT',       '/c:?RAs?C{[GY8`7FL:rtsOM_ P@K2MNPV=S|Q`6!?)_zOho(@@K+8b{9tpHSg{C' );

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
