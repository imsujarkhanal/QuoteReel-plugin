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
define( 'DB_NAME', 'widget' );

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
define( 'AUTH_KEY',         'PbunUCFQg_uv%F7w5^]PY]CQ>U_8=374I33//Id@=yLn?>pWVE+^oEj.^N5)k;G*' );
define( 'SECURE_AUTH_KEY',  'IkCiWyl@lS)uk;yyLSs0u7LN7>Lkq!1}-,D&n?/a3[HG#x;M,k@p%4eg0b}`1GHR' );
define( 'LOGGED_IN_KEY',    'Kt=:a~4Q$=^Y7>bxW+2&pt&.$k0rvT0o-6;I%g@5wMw-]fU[~%*Ldzj_niY_*8ez' );
define( 'NONCE_KEY',        '|>!x?.OtJl:y!FuWtJ###O)Sy8B$+%b!plaNO@GadkLlz]sUsm]fmL7]N)Ee lfR' );
define( 'AUTH_SALT',        'Rv@B&ce!a=*_wXY#FyNE=EN0V#7n{2a{s$GZZ|!(t3eo5)}A4dV,<}|8uryh!Z%Z' );
define( 'SECURE_AUTH_SALT', 'cpk,o9W<<-9ckR_^nmZ6OKoP/Qmxkhbza2XbqLB?t94Oy|._$Ri?{50Cf?L~0$Tx' );
define( 'LOGGED_IN_SALT',   '{ci8:FW*_ erK8N#r!7AL1F(|/>n0.CVi#a}FbHED_SD=X50#4u/9] n+^plS)){' );
define( 'NONCE_SALT',       ' =WxPq$!wW]wdZ&_lyEc}^== &R#5Nvw9U=$|-G0YsYt44g26@XY49l~u-2Y/&xO' );

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
