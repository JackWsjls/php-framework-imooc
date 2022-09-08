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
    if(!is_dir($this->path.date('YmdH'))){
      mkdir($this->path.date('YmdH'), '0777', true);
    }
    // .date('YmdH') 作用是1小时生成一个文件 PHP_EOL 换行
    return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s') . ' ' . json_encode($message).PHP_EOL, FILE_APPEND);
  }
}