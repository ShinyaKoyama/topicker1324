<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
// define('DB_NAME', 'database_name_here');
define('DB_NAME', 'heroku_6a4397fff3672b5');

/** MySQL データベースのユーザー名 */
// define('DB_USER', 'username_here');
define('DB_USER', 'b75afc9cedf94c');

/** MySQL データベースのパスワード */
// define('DB_PASSWORD', 'password_here');
define('DB_PASSWORD', '4b3d26ff');

/** MySQL のホスト名 */
// define('DB_HOST', 'localhost');
define('DB_HOST', 'us-cdbr-iron-east-03.cleardb.net');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
/*
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');
*/
define('AUTH_KEY',         '7kA|_$~q/rF`:hTpnKz/%D*[TBpM~H6%1jFf_!XdQ!-Y63u&FWr$R+8,k}%:ytGo');
define('SECURE_AUTH_KEY',  '/eHpYA4`^12vOWTp:Eb=XAo}I2C27ouN`!|1i8bn+OB uJ,c@aMJ=xAtLkw*L<D*');
define('LOGGED_IN_KEY',    'p/R^,VK+5hX_ifW{>Qi},p(LJruhhq.!%!w^F2Pzorx,R heB|M(2gQQXfQ0bLam');
define('NONCE_KEY',        ')q+J0~X_:>!@R+03m2^_&5*g@8uso?^ b6Y/UHP>s:9#/yu=O[9[9jbu)VPCG5nk');
define('AUTH_SALT',        'L>A@q3W!9.S{RXK?$s*1.~1A03PV q-Lo#<]=Je ._JYb#/-@e+-GUx4n :vcEQ^');
define('SECURE_AUTH_SALT', '#-yP64bh-Qk:T=|80~U/(V%4-4H;j?gjR[yK_;DB;<NS[7XV!9ycR::h3*n|8^JU');
define('LOGGED_IN_SALT',   '=ipoBo-+Cy?=uH}7pu2k&m/#Y&|]iK6B$N[N~*1$Qb+6C5kNAgJ6RM4ue.a5b033');
define('NONCE_SALT',       'gJu18,Ay_^cd.YmO=L|E~-.O4E}.WmHG#&^u1{,FEIV,?$[MfALRN&<x@5k0?#M6');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
