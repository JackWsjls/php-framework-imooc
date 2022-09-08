<?php
namespace app\model;

use core\lib\model;

class jobModel extends model
{
  public $table = "job";
  public function lists()
  {
    $ret = $this->select($this->table, "*");
    return $ret;
  }

  public function getOne($age)
  {
    $ret = $this->get($this->table, "*", array(
      "age"=>$age
    ));
    return $ret;
  }

  public function updateOne($age, $data)
  {
    return $this->update($this->table, $data, array(
      "age"=>$age
    ));
  }

  public function deleteOne($age)
  {
    return $this->delete($this->table, array(
      "age"=>$age
    ));
  }
}