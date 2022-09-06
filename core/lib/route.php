<?php
namespace core\lib;

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
    p($_SERVER);
    if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {

    } else {
      $this->ctrl = 'index';
      $this->action = 'index';
    }
  }
}