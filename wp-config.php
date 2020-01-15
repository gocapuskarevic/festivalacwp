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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'racunari' );

/** MySQL database username */
define( 'DB_USER', 'phpgoca' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '_OFt?%P?p`(mt3O;@hGCr_[/<38vD32$u7)I[sm|:L_>U4*VGzFZuQ|x-M}%w1*2' );
define( 'SECURE_AUTH_KEY',  'Z]Zh^6r?y3-d`2BOERcmd UsZo|-S/P%3gkLkp %DmE966oFP}(CW132OAxcV]!v' );
define( 'LOGGED_IN_KEY',    '?GykY  ``Lsd_7u_-;(g{q1@[Y4it8wcJ76L;stU)|-$)l)U/fFwmC/lMlHf~pMg' );
define( 'NONCE_KEY',        'Xo0M.M7o;pAcIeqc1UU^}Cw{pNZG-%;o2]&g~YJ[H@B;%jSx]Y~,zZY?J.6E[G-~' );
define( 'AUTH_SALT',        'oaQ>[,9n9U~@I#[!n*Z9@<%;gn;qOjMx?]4RQtZJ5e5]!8D[UX3Bsr!%Z!Pd>C%y' );
define( 'SECURE_AUTH_SALT', 'gODp ][ f|W0Sh4L`{d(Q:>k,8I0z~nMB)s]tHVeyqKr+:4lB>o!taT_gpA*lq|w' );
define( 'LOGGED_IN_SALT',   '~/>x)/qu/zdz1$vk0Xs+U~}y.J3gjyqD0J3BWP-83A<hFf04KCdzLGx{>fb)%2_F' );
define( 'NONCE_SALT',       '2gG,aWXarv,6`^Bi9|iIA=L=[c0I#f_g[-80 yeX32! %`x,&5ndAGZRnt!*~8v3' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

