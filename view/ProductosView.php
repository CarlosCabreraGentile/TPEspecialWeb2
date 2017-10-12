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

function errorCrear($error){
   $this->smarty->assign('error', $error);

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

function mostraredit($producto){
  $this->smarty->assign('productos', $producto);
  $this->smarty->display('templates/formEdit.tpl');
}

function mostrarEditMarca($marcas){
  $this->smarty->assign('marcas', $marcas);
  $this->smarty->display('templates/editMarca.tpl');
}

public function seeBody()
{
  $this->smarty->display('templates/body.tpl');
}
}

?>
