<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cuvey');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9E`Q{56mLxM2&+z[y.5i9O!aY6wiBSNAio^!CNHSB|5pfhzmb%GPqbhr?(+yFP@:');
define('SECURE_AUTH_KEY',  '9jPX`|`.=.d2XhSv}o%~m:g?%VzMi4{J7M5DJ3p>x]779?kWnK,5Ly~@I@K{a$b>');
define('LOGGED_IN_KEY',    'Z&E04#Fo%)M;&ZhHf.5aam&TSG4uA`?OGGQv:%`Qcl ,;Ua8^TAuF22I3TqqiG=7');
define('NONCE_KEY',        'i4nOtE3:}znX%aMSZ !HURL`ImgD.<!*`o5QFec,Apsi2.89w3I$v)KR-BLYl%S;');
define('AUTH_SALT',        'aiUAS=?=,v?VPq|g%3k;WN]+7?5NM5uo~[!f+%<lzD.Ww6dV*5*|&67L;Ml1seqY');
define('SECURE_AUTH_SALT', '.A.U$*>pR@8Y`g{YennKJ`1|M/|g^_@rB09]mlU`j?JL*Fg`($vYAO5n8n$5}j/@');
define('LOGGED_IN_SALT',   '7}2wcWt<w!kO<4j9<,53Z9/nKIA-8fX:,ygwN*GHq=*pk[4q?&AKZ5$1F#E8^_y]');
define('NONCE_SALT',       'OPp^vvn:E;m;f6IpNL~}(  GrAErV)zAp$7RL3g6gB[d|.iX,zkLs+ )zd$:n7tP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
