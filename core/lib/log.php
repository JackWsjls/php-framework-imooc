<?php
namespace core\lib;
use core\lib\conf;
class log
{
  /**
   * 确定日志存储方式
   * 写日志
   */
  static $class;
  static public function init() {
    // 确定存储方式
    $drive = conf::get('DRIVE', 'log');
    $class = '\core\lib\drive\log\\'.$drive;
    self::$class = new $class;
  }

  static public function log($name)
  {
    self::$class->log($name);
  }

}
