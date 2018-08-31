<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '123456',
        'dbname'      => 'week',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        // 'baseUri'        => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
        'baseUri'        => preg_replace('/\/index\.php/', '', $_SERVER["PHP_SELF"])
    ],
    'error' =>[
        'success'       => 0,//请求成功

        'noland'        => 1001,//没有登录
        'landed'        => 1002,//登录超时
        'unameerror'    => 1003,//账号错误
        'pswerror'      => 1004,//密码错误
        'nopower'       => 1005,//没有权限
        'noaudit'       => 1006,//账号审核

        'dataerror'     => 2001,//数据错误
        'crpterror'     => 2002//数据加密解密错误
    ],
    'loginname' => 'token',
    'listsize' => 16
]);
