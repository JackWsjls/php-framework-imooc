<?php

namespace core\lib\drive\log;
use core\lib\conf;
/**
 * 文件系统
 */
class file
{
  public $path; // 存储日志位置
  public function __construct()
  {
    $this->path = conf::get('OPTION', 'log')['PATH'];
  }

  public function log($message, $file='log')
  {
    /**
     * 确定文件存储位置是否存在
     * 新建目录
     * 写入日志
     */
    if(!is_dir($this->path)){
      mkdir($this->path, '0777', true);
    }
    $message .= date('Y-m-d H:i:s');
    file_put_contents($this->path.$file.'.php',json_encode($message));
  }
}