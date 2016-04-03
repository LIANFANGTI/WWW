<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'zckj_db');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'root');

/** MySQL主机 */
define('DB_HOST', '121.196.226.94');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^X~^ODGYke3IsZ(l<1Ipp5TA-yy*wl}SA7|b~3SyA_3K7E@z+LZ%C_+mu }RCY3J');
define('SECURE_AUTH_KEY',  'U[4$!]</~fitb*3]*G<@W}A%Fx2nIZQdzU{66yhlI4ix#n0nM)!`m)|Kj=|-m[MB');
define('LOGGED_IN_KEY',    'RdNJqSL:zp{BC|)!E-HjhHQyEW,qlM[-M!Xy|(2WlaoUqFpcU/;5vXK&%:ia@Pz4');
define('NONCE_KEY',        '&pp;{hb+bnEj4-v-5,7{Bbsg_ryisBItq{;?xtFlALj)t5I6/)}.{!DJ z|MD6q~');
define('AUTH_SALT',        'rYMIA<es-wr_j.@pe8j7wK{814!@j-4;jLynn9Q+Vg8zsral+[m4h!Vy*.6>Q6C=');
define('SECURE_AUTH_SALT', 'G_-H|)Af!G>xJXrI?Z|Vlh]XvphJYqN-d7d9k)`J|6,^AqVcN7oJ1w,w>1|J x05');
define('LOGGED_IN_SALT',   'tgG5-}Y,B)$Q!x|3}co2km/V7-IVFC0IKDc/*2J[n;3W7q|dy!=+@mDhjlNMzk-+');
define('NONCE_SALT',       ' -G&VL/J[Rh+NkuC&;Mzsc4+k|-mj0s|/qKlwhqUX0:3[T.Y+s}[kl4:ssz+{(hI');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
