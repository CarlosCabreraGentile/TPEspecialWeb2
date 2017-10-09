<?php
define('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/login');
define('LOGOUT', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/logout');
define('COMPARATIVA', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/comparativa');
class Controller
{
  protected $view;
  protected $model;
}
 ?>