<?php
include_once('model/ProductosModel.php');
include_once('view/ProductosView.php');

class ProductosController extends Controller
{


  function __construct()
  {
    $this->view = new ProductosView();
    $this->model = new MarcasModel();//nueva linea
  }

  public function index()
  {
    $marcas = $this->model->getMarcas();
    $this->view->mostrarMarcas($marcas);
  }
}

 ?>
