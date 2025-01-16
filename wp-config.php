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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp\htdocs\proyecto_wp\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'wp_practica' );

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
define( 'AUTH_KEY',         'u.L86Y5^o+-67mV4GqmL*Ryfvr(T4fw,)w{rrZ={t!-gP}5Z=OA|:w5`U<dx34VV' );
define( 'SECURE_AUTH_KEY',  '%qK6eKrzrAHMdFsi4;t1LOa4tjoa75;Vc<!1UT/5U?2;Y]wDsaq|4,s3aD/08MB8' );
define( 'LOGGED_IN_KEY',    'ikYSz.n#jXbOwn:ER^Rb4J,EHgB3Y!{=TZ&OAQ[97f,r9zDr2w$]srb{SF]:Jik0' );
define( 'NONCE_KEY',        'Llda;_v`I8wOOUYRd)9f/U&j&e`Er+!`AQv/J?dPO4q$-&2zmy#CDSlaZm.X7i4i' );
define( 'AUTH_SALT',        '5Mhwc]Qlu+v91~GR`Jf)&f99O1&b26? Xlc{e9cJCtk`_Ww%-+.fv@|,z#8D=E8,' );
define( 'SECURE_AUTH_SALT', 'S`ay_w,yRPbQLZv?Y;)b9I9.WMx!Oo||O0w5[*jj>w`&*R_{M8D}b;G`Vzlr1w C' );
define( 'LOGGED_IN_SALT',   'FpA5Dl|BfaUM8zhM;DdZz)H=VC:nppq^tPP,l38Kg~.%r9 RLm_MaU}twbC/rV#>' );
define( 'NONCE_SALT',       'y-(!c{:L4:2e$c6{AL5b(%YE+`1Fgnc_|/H-F]39TK./5F?HVofM8EvYA/u+m?`7' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
