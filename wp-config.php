<?php
define('WP_ALLOW_MULTISITE', true);
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'ludisfmfcdwps' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'ludisfmfcdwps' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'v43W0LCMt0R' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'ludisfmfcdwps.mysql.db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'aY[>(G{_B7/rCH0 -%EH=.<[{iV8M`PC0s-nW[r]z[y)cHO}^Jg-ELNB%}h]<^ha' );
define( 'SECURE_AUTH_KEY',  'yJA=4?_G2Iv{Q*1uAv}LxRdEg=@.&lLVi1q!0L:,?5lcwS!+|2H[91*/=,_aL02}' );
define( 'LOGGED_IN_KEY',    '[|SDeQc-:wnL4UHfyOHUiVD<,rV!0Le^;Aa6eFvlg&O+[5dpbUQwH*t/ [^i<Ke]' );
define( 'NONCE_KEY',        '!n`c#v2x/oAy %)NUQ86!^l`Q,Cf__2l&L:W(%c||- *C}Jq%lLhV8,]v6B6+EY.' );
define( 'AUTH_SALT',        '5lX8z<^D=ZHY4OqZt55n~2cf!l]$d>B2%pi+WG|8}i0/:k?aWN>zCY4sEa5F/#Og' );
define( 'SECURE_AUTH_SALT', 'oXuQV<?]X-v2E83YFkZ3%qrvb&4u^Ry{sgiWK}hu&U4P<p|XB1<,;KZ:_eki[RI1' );
define( 'LOGGED_IN_SALT',   '_F`?Ia*.=!T|J`[R;wt5.g7|+cdMfZ9d|*34N8.i|&H4)IzN2*&LoNRfEA[1Zf`|' );
define( 'NONCE_SALT',       '-X[Gb`?wT(S)zCN 6cVmlfdH:prP%8mPKVua&9-Dprs-q#%MBvq/!0%q<P$X#bg0' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'LTwhk7Uu_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
