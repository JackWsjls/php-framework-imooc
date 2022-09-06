<?php

/**
 * 入口文件
 * 定义常量
 * 加载函数库
 * 启动框架
 */

define('imooc',realpath('./')); // 根目录
 define('core', imooc.'/core'); // 核心文件
 define('app', imooc.'/app'); // 项目 控制器 模型

 define('debug', true);     

//  判断是否显示错误
 if (debug) {
  ini_set('display_error', 'On');
 } else {
  ini_set('display_error', 'Off');
 }

 include core.'/common/function.php'; // 加载函数库
 include core.'/imooc.php'; // 启动框架

 spl_autoload_register('\core\imooc::load'); // 类不存在时触发方法

 \core\imooc::run();
