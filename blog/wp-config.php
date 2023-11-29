<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings

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
define( 'DB_NAME', 'cleanore_clean_power_bloger' );

/** Database username */
define( 'DB_USER', 'cleanore_cps_use' );

/** Database password */
define( 'DB_PASSWORD', '[Chrq^+=gMT_' );

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
define( 'AUTH_KEY',         '4rCwWe)+EWpn@KcPO^ rs,q^bl+~_^a(q9&w.d|,F>zuwk1VM.nSTVSOhwc5;f;_' );
define( 'SECURE_AUTH_KEY',  '2>!nJDyvj@?Rp(OIkJ ?m0(R3eyoEr.r^im_ORWg5v9>1,aUVvXkCN];V77<B}1]' );
define( 'LOGGED_IN_KEY',    'Sx<8-YkQO9<~op[dDVBn}fU+._;E.#sA-Gj)4b2Y#yBDmgYnU&#gXPPv!9y_Q:hi' );
define( 'NONCE_KEY',        'WUvrVb<T.2`qrw29GgZC3/%LnmOENGpT9Pw@2CDdrt rX$kcTSR]iQ)}Au_bb4El' );
define( 'AUTH_SALT',        'L?<a(j$KTd!#*Q[GUL&oeYX(RQE0Aho^&ZI]mSXL-w/w~J6Z*Gj6-_wU7!5&*B<^' );
define( 'SECURE_AUTH_SALT', 'A|Z:l9P^Vf%Gjgm8mMYT9dA^H?BqQNNEV%!dm~fEc%5iYuN[w7!X9#@EZzK5ycw#' );
define( 'LOGGED_IN_SALT',   'Y$#_:JhcsBoF)+MwcYdPBA,$n~daiq#JtRT%/&/um|vhJZ42`uxb|3F@B$aQf##7' );
define( 'NONCE_SALT',       ';b!vbi]qaWYfj_cRvPGmHD)F)>RH(yfgvKg:4NS]J4,Jf=B!{d%Gr(F#)<At0iXt' );

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
