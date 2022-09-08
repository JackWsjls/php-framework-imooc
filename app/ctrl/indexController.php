<?php
namespace app\ctrl;
use core\lib\model;
class indexController extends \core\imooc
{
  public function index() {
    // p("index controller");
    // 数据库操作
    // $model = new \core\lib\model();
    // $sql = "select * from job";
    // $ret = $model->query($sql);
    // p($ret->fetchAll());

    // 视图
    // $data = "hello world";
    // $title = "视图文件1";
    // $this->assign('title', $title);
    // $this->assign('data', $data);
    // $this->display('index.html');

    // $temp = \core\lib\conf::get('CTRL', 'route');
    // $temp = \core\lib\conf::get('ACTION', 'route');
    
    // *********medoo*********
    // $model = new model();
    // dump($model);
    // 查询数据
    // $data = $model->select("job","*");
    // 插入数据
    // $data = array(
    //   "name" => "phper",
    //   "sex" => "女",
    //   "age" => 22,
    //   "hiredate" => "1991-04-27",
    //   "wage" => "8000.00",
    //   "type" => 2
    // );
    // $ret = $model->insert("job", $data);
    // dump($ret);

    // $model = new \app\model\jobModel();
    // $ret = $model->lists();
    // // dump($ret);

    // $data = array(
    //   'name'=>'敏燕2'
    // );
    // $updateOne = $model->updateOne(22, $data);
    // dump($updateOne);

    // $deleteOne = $model->deleteOne(22);
    // dump($deleteOne);

    // $retOne = $model->getOne(22);
    // dump($retOne);

    // *********twig*********
    $data = "hello world";
    $this->assign('data', $data);
    $this->display("index.html");
  }

  public function test()
  {
    $data = "index2";
    $this->assign('data', $data);
    $this->display("index2.html");
  }
}