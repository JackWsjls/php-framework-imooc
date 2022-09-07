<?php
namespace core\lib;
use core\lib\conf;
class route
{
  public $ctrl;
  public $action;
  public function __construct()
  {
    // p("route ok");
    // xxx.com/index1/index2 希望访问到index1控制器中的index2方法 
    /**
     * 隐藏index.php
     * 获取URL 参数部分
     * 返回对应的控制器和方法
     */
    // p($_SERVER);
    // 项目放在apache下php-framework-imooc文件夹下，所以避开链接里的项目名称
    if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/php-framework-imooc/') {
      // index/index
      $path = $_SERVER['REQUEST_URI'];
      $patharr = explode('/', trim($path, '/'));
      if (isset($patharr[0])) {
        unset($patharr[0]); // 存在的话去掉便于下面处理其他参数
      }
      if (isset($patharr[1])) {
        $this->ctrl = $patharr[1];
        unset($patharr[1]); // 存在的话去掉便于下面处理其他参数
      }
      if (isset($patharr[2])) {
        $this->action = $patharr[2];
        unset($patharr[2]); // 存在的话去掉便于下面处理其他参数
      } else {
        $this->action = conf::get('ACTION', 'route');
      }
      // p($patharr);
      // 把url剩余部分转换成get参数 /id/1/username/xiaoming
      $count = count($patharr) + 3;
      $i = 3;
      while ($i < $count) {
        if (isset($patharr[$i + 1])) {
          $_GET[$patharr[$i]] = $patharr[$i + 1];
        }
        $i = $i + 2;
      }
      // p($_GET);
    } else {
      $this->ctrl = conf::get('CTRL', 'route');;
      $this->action = conf::get('ACTION', 'route');;
    }
  }
}