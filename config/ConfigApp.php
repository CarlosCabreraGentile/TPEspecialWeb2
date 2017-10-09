<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'ProductosController#index',
      'home'=> 'ProductosController#index',
      'productos' => 'ProductosController#index',
      'nvidiaboostrap'=> 'ProductosController#nvidia',
      'atiboostrap'=> 'ProductosController#Ati',
      'comparativa'=> 'ProductosController#comparativa',
      'comparativaNormal'=> 'ProductosController#comparativa',
      'agregarProducto'=> 'ProductosController#create',
      'guardarProducto'=> 'ProductosController#store',
      'borrarProducto' => 'ProductosController#destroy',
      'finalizarProducto' => 'ProductosController#finish',
      'filtrar' => 'ProductosController#filtro',
      'editarProducto' => 'ProductosController#edit',//BOTON QUE INICIA LA EDICION
      'editar' => 'ProductosController#editar',
      'filtrar' => 'ProductosController#filtro',
      'login' => 'LoginController#index',
      'verificarUsuario' => 'LoginController#verify',
      'logout' => 'LoginController#destroy'
    ];

}
?>
