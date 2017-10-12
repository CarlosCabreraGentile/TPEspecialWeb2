<?php

class SecuredController extends Controller
{

  function __construct()
  {
    session_start();
    if(isset($_SESSION['usuario'])){
      if (time() - $_SESSION['LAST_ACTIVITY'] > 60) {
        header('Location: '.LOGOUT);
        die();
      }
      $_SESSION['LAST_ACTIVITY'] = time();
    }
 //   else {
   //   header('Location: '.LOGIN);
     // die();
    //}
  }
}

 ?>
