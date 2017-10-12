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
      "guardarMarca"=> 'ProductosController#agregarMarca',
      'borrarProducto' => 'ProductosController#destroy',
      'borrarMarca' => 'ProductosController#destroyMarca',
      'filtrar' => 'ProductosController#filtro',
      'editarProducto' => 'ProductosController#edit', //ABRE LA VENTANA PARA EDITAR
      'comienzoEditarMarca' => 'ProductosController#comienzoEditMarca',
      'editarMarca'=>'ProductosController#editarMarca',
      'editar' => 'ProductosController#editar',//EDITA EL PRODUCTO
      'filtrar' => 'ProductosController#filtro',
      'login' => 'LoginController#index',
      'verificarUsuario' => 'LoginController#verify',
      'logout' => 'LoginController#destroy',
      'sesionExpirada' => 'LoginController#expirada',
       'body'=>'ProductosController#traemeElbody',

    ];

}
?>
