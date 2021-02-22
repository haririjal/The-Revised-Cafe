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
define( 'DB_NAME', 'TheRevisedCafe' );

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
define( 'AUTH_KEY',         'u}~(5z]]okYsxAA}I@8kRTaHuOxXy=u=~Ue4tw5N,Ko&Wcgz/AJ^Y8Mh{&KJ[;4$' );
define( 'SECURE_AUTH_KEY',  '+^KMXjPo:qud6,fp^<GX0On<h+RR+w57o!_p-O$kD*qLp,%9 Kc.GqU`a KC6P>F' );
define( 'LOGGED_IN_KEY',    'Py;M<Wc[:+FT$)o^Frx~Vw<w&C[?,odz,s>4`M- I:)Iz@.hs:3vJnk9jX oO&vR' );
define( 'NONCE_KEY',        '2VZ|RWhsj+Yk.v)0dP>Ron;s9@;2czLg.eInKxDH5nd-%aDp;x1_#!>o7UcH_*Y)' );
define( 'AUTH_SALT',        ')^Y]/2CT&%=&RVeV8%<X`L*B}))~Dj#ddatYY,w:7$#T/~tW[_Gt=&IiQ_&VHV1?' );
define( 'SECURE_AUTH_SALT', 'X.PH)87rI![2(U:6m;1.Y7HkJBP;#Rt(G%LISQ <p}5~D+tuKNBkAY|YVO[kmld)' );
define( 'LOGGED_IN_SALT',   '9gFw9j6ybPazVT;]4Ek.vcu>&>{e_./Va693Hs{1vK/sC6xj59XzNKe+OC=;3+w~' );
define( 'NONCE_SALT',       '+]td*Xg+s39T0`*Cx+,^wl~ P*D~e:F_glvU!AJ?9:[O+E(?$t8$.#,|m*]7[jLq' );

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
