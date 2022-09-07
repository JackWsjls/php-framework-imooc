<?php
namespace app\ctrl;
class indexController extends \core\imooc
{
  public function index() {
    // p("index controller");
    // 数据库操作
    $model = new \core\lib\model();
    $sql = "select * from job";
    $ret = $model->query($sql);
    p($ret->fetchAll());

    // 视图
    // $data = "hello world";
    // $title = "视图文件1";
    // $this->assign('title', $title);
    // $this->assign('data', $data);
    // $this->display('index.html');

    $temp = \core\lib\conf::get('CTRL', 'route');
    $temp = \core\lib\conf::get('ACTION', 'route');
  }
}