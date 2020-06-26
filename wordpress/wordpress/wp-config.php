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
define( 'DB_NAME', 'cadc' );

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
define( 'AUTH_KEY',         '69kV-/z$pLN/Knood%R|K%IMiCgdfO-<j_j.Xik~.s`9RT|jd8%t(Ql!HYRrVtCF' );
define( 'SECURE_AUTH_KEY',  '8tSaY{ma`AXwK*zyoW&}$fi30H1KO5S{e}~Ek2;2(<nZi_Br~* 3tIB4^/c]#X?U' );
define( 'LOGGED_IN_KEY',    ' =<kH3E)Ewa*`cv9?30{6[TB07iY4{kBm!`_x MA&GuFd{u$_ha(uX6Fe.h.d=tg' );
define( 'NONCE_KEY',        'UPQ`~HAse#7<p]XMGT|&/%lV0)jzOT4V#=34bNpi}43K~GGR> 4a8!@#UJ:Q:VXm' );
define( 'AUTH_SALT',        'Es$$&3I3D<COdbVCE>v4)zN p)vj -H>CB`cHX+~B9&kf|D]$oh!-VSCT<D<sWiR' );
define( 'SECURE_AUTH_SALT', 'WE?FY(cKL(tM+>TBlodQ-~3|G0i4^v1?)UMAR_lNk?Y~s?y1?_Q{/syLhfVkJ+rB' );
define( 'LOGGED_IN_SALT',   'KGikKG)!EPfwH*la|7~%@nD~dX>~1J@&|5crQ0<.:~%1W#-6n6g56B-q|<9` j|a' );
define( 'NONCE_SALT',       '{KO1j@fd&C#%O7tl$_0MsI-4;GlT%AU7a);~u8%<5NwA&^NY;NmL{mk ]GHApI/I' );

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
