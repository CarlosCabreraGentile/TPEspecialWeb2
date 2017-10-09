<?php

class Model
{
  protected $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tarjetas;charset=utf8', 'root', '');
  }
}
 ?>
