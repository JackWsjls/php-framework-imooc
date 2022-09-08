<?php
namespace core\lib;
use core\lib\conf;
class model extends \PDO
{
  public function __construct()
  {
    // $dsn = 'mysql:host=localhost;dbname=dbname';
    // $username = 'root';
    // $password = '123456';
    $database = conf::all('database');
    try {
      parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD']);
    } catch (\PDOException $e) {
      p($e->getMessage());
    }
  }
}