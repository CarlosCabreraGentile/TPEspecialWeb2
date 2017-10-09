<?php
class ProductosView extends View
{
  function mostrarProductos($producto,$marca){
    $this->smarty->assign('productos', $producto);
    $this->smarty->assign('marcas', $marca);
    $this->smarty->display('templates/comparativa.tpl');
  }
   function mostrarIndex(){
    $this->smarty->display('templates/index.tpl');
  }


  function mostrarCrearProductos(){
    $this->assignarProductoForm();
    $this->smarty->display('templates/formCrear.tpl');
  }

  function errorCrear($error, $titulo, $descripcion, $completada){
    $this->assignarProductoForm($titulo, $descripcion, $completada);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCrear.tpl');
  }

  private function assignarProductoForm($titulo='', $descripcion='', $completada=0){
    $this->smarty->assign('titulo', $titulo);
    $this->smarty->assign('descripcion', $descripcion);
    $this->smarty->assign('completada', $completada);
  }

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


}

 ?>
