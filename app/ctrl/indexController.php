<?php
namespace app\ctrl;
use core\lib\model;
use \app\model\messageModel;
class indexController extends \core\imooc
{
  // 所有留言
  public function index() {
    $model = new messageModel();
    $data = $model->all();
    $this->assign('data',$data);
    $this->display('index.html');
  }
  // 添加留言
  public function add() {
    $this->display('add.html');
  }
  // 保存留言
  public function save() {
    // $data['title'] = post('title', '0', 'int');
    $data['title'] = post('title');
    $data['content'] = post('content');
    $data['createTime'] = time();
    $model = new messageModel();
    $ret = $model->addOne($data);
    if ($ret) {
      // p("ok");
      jump("/php-framework-imooc/index/");
    } else {
      p("error");
    }
  }

  public function del() {
    $id = get('id', 0, 'int');
    if ($id) {
      $model = new messageModel();
      $ret = $model->delOne($id);
      if ($ret) {
        jump("/php-framework-imooc/index/");
      } else {
        exit('删除失败');
      }
    } else {
      exit('参数错误');
    }
  }
}