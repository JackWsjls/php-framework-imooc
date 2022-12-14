<?php

namespace core;

class imooc
{
  // 数组 缓存已经加载的类库
  public static $classMap = array();
  public $assign;
  // 主执行
  static public function run()
  {
    // 加载日志
    \core\lib\log::init();
    // \core\lib\log::log('test');
    // \core\lib\log::log($_SERVER);
    // \core\lib\log::log($_SERVER, "server");
    // p("ok");
    // 加载路由
    $route = new \core\lib\route();
    // p($route);
    // 加载控制器
    $ctrlClass = $route->ctrl;
    $action = $route->action;
    // 控制器路径
    $ctrlfile = module.'/ctrl/'.$ctrlClass.'Controller.php';
    // p($ctrlfile);exit(); // D:\php\xampp\htdocs\php-framework-imooc/app/ctrl/indexController.php
    // $ctrlClassPath = '\app\ctrl\indexController' 应该是这样的路径
    $ctrlClassPath = '\\'.module.'\ctrl\\'.$ctrlClass.'Controller';
    // p($ctrlfile);
    // p($ctrlClassPath);
    if (is_file($ctrlfile)) {
      include $ctrlfile;
      $ctrl = new $ctrlClassPath();
      $ctrl->$action();
      \core\lib\log::log('ctrl:'.$ctrlClass.' '.'action:'.$action);
    } else {
      throw new \Exception('找不到控制器'.$ctrlClass);
    }
  }

  static public function load($class)
  {
    // 自动加载类库     
    // new \core\route();     // $class='\core\route'; // imooc.'/core/route.php';
    if (isset($classMap[$class])) {
      return true;
    } else {
      $class = str_replace('\\', '/', $class);
      $file = imooc .'/'. $class . '.php';
      // p($file); 
      // D:\php\xampp\htdocs\php-framework-imooc/core/lib/route.php
      if (is_file($file)) {
        include $file;
        self::$classMap[$class] = $class;
      } else {
        return false;
      }
    }
  }

  public function assign($name,$value) {
    $this->assign[$name] = $value;
  }

  public function display($file) {
    $file = module.'/views/'.$file;
    if(is_file($file)){
      extract($this->assign);
      // include $file;

      // 使用 twig
      $loader = new \Twig\Loader\FilesystemLoader(app.'/views');
      $twig = new \Twig\Environment($loader, [
          'cache' => imooc.'/log/twig',
          'debug' => debug
      ]);
      $template = $twig->load('index.html');
      $template->display($this->assign?$this->assign:'');
    }
  }

}