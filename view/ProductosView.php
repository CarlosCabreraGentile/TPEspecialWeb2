<?php
class ProductosView extends View
{
  function mostrarProductos($producto,$marca,$usuario){
    $this->smarty->assign('productos', $producto);
    $this->smarty->assign('marcas', $marca);
    $this->smarty->assign('usuario', $usuario);
    $this->smarty->display('templates/comparativa.tpl');
    //$this->smarty->display('templates/comparativaNormal.tpl');
  }

   function mostrarIndex($usuario){
    $this->smarty->assign('usuario', $usuario);
    $this->smarty->display('templates/index.tpl');
  }


  function mostrarCrearProductos(){
    $this->assignarProductoForm();
    $this->smarty->display('templates/formCrear.tpl');
  }

  function errorCrear($error, $productos, $marcas){
   // $this->assignarProductoForm($titulo, $descripcion, $completada);
    $this->smarty->assign('error', $error);
  //  $this->smarty->display('templates/formCrear.tpl');
  }

 /* private function assignarProductoForm($titulo='', $descripcion='', $completada=0){
    $this->smarty->assign('titulo', $titulo);
    $this->smarty->assign('descripcion', $descripcion);
    $this->smarty->assign('completada', $completada);
  }*/

  function mostrarNvidia(){
  $this->smarty->display('templates/nvidiaboostrap.tpl');
  }

function mostrarAti(){
   $this->smarty->display('templates/atiboostrap.tpl');
}

function mostrarComparativa(){
  
  $this->smarty->display('templates/comparativa.tpl');
}
  function guardaProductos($producto,$marca){
    $this->smarty->assign('productos', $producto);
    $this->smarty->assign('marcas', $marca);
    $this->smarty->display('templates/guardarProductos.tpl');
  }

  function mostraredit($producto){
    $this->smarty->assign('productos', $producto);
    $this->smarty->display('templates/formEdit.tpl');
  }


}

 ?>
