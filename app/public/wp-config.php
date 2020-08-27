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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GrNM9BwO+am28v0bKeONRWxpLC4cA871Jl/69S+DhChurajVdM8xlS+tEGIHUUp5st+o8ficIx7SjM8NTXkt+g==');
define('SECURE_AUTH_KEY',  'e5zPtLwm1byvpBu/GjXkYvOVyTCIjlhMSTvmi4lVEC/aVaLQRzp8vZbGl7WoStf4FrF5SBFWSw933azvBMLHnw==');
define('LOGGED_IN_KEY',    'J0cMNKF1Nc3DhvP4rNbBqvRA+ZFOh0uGyExIfyli/aKBIf8s2oO7Oq1sF+9AMQJeVYEv+tLmPeD1qaEQCwyZMQ==');
define('NONCE_KEY',        's/VHyz1DK5N8l8lxJHO3ToztVXGBle3qvOKWQ8aqZGt5B0bSBlEm4gH1ZLdrMOA672J61VDxgKbHe6MTh20AWw==');
define('AUTH_SALT',        'vWZ85Y7oAVCuDuBbx1ipkfN7X/6e44WsMf2dujyv2TLezP+GZvTkiG641dgExewmbIPAkShF7Wq7RSB20iPBDA==');
define('SECURE_AUTH_SALT', 'DtFkiOBvazerjt3u8O95x9683ioG886WIoaJV33x5IK7TI1wwrYkxir4YSpR4YcWjADcc+jv+xK0WByvypxJww==');
define('LOGGED_IN_SALT',   'jr9sSHpu/yWpVgOWBE0pmQwRMdRF7kxFmcoF4u8NoMv+9b4Jv3b+so3lZLxA0pb1PLuEWoVumSpoWu9ONMRFeg==');
define('NONCE_SALT',       'RAfuFBN8p1E0ZO8xYqdOXj/TBbdh3aI663rO7fNzmvIuuSUvVkm1Z4m0JOkl+2j88Bn73T4y2Hjq3/7m99LUxg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
