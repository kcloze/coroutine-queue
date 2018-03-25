<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
! defined('DS') && define('DS', DIRECTORY_SEPARATOR);
// App name
! defined('APP_NAME') && define('APP_NAME', 'swoft');
// Project base path
! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));
// Register alias
$aliases = [
    '@root'       => BASE_PATH,
    '@env'        => '@root',
    '@app'        => '@root/src',
    '@runtime'    => '@root/runtime',
    '@configs'    => '@root/config',
    '@properties' => '@configs/properties',
    '@console'    => '@beans/console.php',
    '@commands'   => '@app/command',
];
\Swoft\App::setAliases($aliases);