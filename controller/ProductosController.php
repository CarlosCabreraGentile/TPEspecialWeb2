<?php
include_once('model/ProductosModel.php');
include_once('model/MarcasModel.php');
include_once('view/ProductosView.php');

class ProductosController extends SecuredController
{
  function __construct()
  {
    parent::__construct();
    $this->view = new ProductosView();
    $this->model = new ProductosModel();
    $this->marcasModel = new MarcasModel();
  }

  public function index()
  {
    $usuario = null;
    //session_start();
    if (isset($_SESSION['usuario'])) { // pregunto si tengo un usuario
      $usuario = $_SESSION['usuario'];
    }  

    $this->view->mostrarIndex($usuario);
  }

  public function nvidia()
  {
    $this->view->mostrarNvidia();
  }

  public function Ati()
  {
    $this->view->mostrarAti();
  }

  public function comparativa()
  {
   $productos = $this->model->getProductos();
   $marcas = $this->marcasModel->getMarcas();

   for ($i=0; $i < count($productos); $i++) {
      $id_marca = $productos[$i]['id_marca'];// puede ser 1, 2, 3, etc son los id que envio con el formulario
      $j=0;
      while (( $j < count($marcas) && (!(isset($productos[$i]['marca']))) ) ) {
        if ($id_marca == $marcas[$j]['id']) {
          $productos[$i]['marca'] = $marcas[$j]['nombre'];
        }
        $j++;
      }
    }
    $usuario = false;
    //session_start();
    if (isset($_SESSION['usuario'])) { // pregunto si tengo un usuario
      $usuario = true;
    }  
 
    $this->view->mostrarProductos($productos, $marcas, $usuario);
    
  
  }
  public function create()
  {
    $this->view->mostrarCrearProductos();
  }

 public function store()
  {
    $productos = $this->model->getProductos();
    $marcas = $this->marcasModel->getMarcas();
    $id_marca = $_POST['id_marca'];
    $modelo = $_POST['modelo'];
    $memoria = $_POST['memoria'];
    $banda = $_POST['banda'];
    $consumo = $_POST['consumo'];
    if((isset($_POST['modelo']) && !empty($_POST['modelo'])) &&
    (isset($_POST['memoria']) && !empty($_POST['memoria'])) &&
    (isset($_POST['banda']) && !empty($_POST['banda'])) &&
    (isset($_POST['consumo']) && !empty($_POST['consumo'])))
    {
      $this->model->guardarProducto($id_marca,$modelo,$memoria,$banda,$consumo);
      $this->comparativa();    
    }
    else{
      $this->view->errorCrear("Todos los campos son requeridos", $productos, $marcas);
    //  $this->view->mostrarProductos($productos, $marcas);
      $this->comparativa();
    }  
  }

  public function destroy()
  {
     if (isset($_POST['id_producto'])) {

        $id = $_POST['id_producto'];
        $this->model->borrarProducto($id);
        $this->comparativa();
     }
    //$id = $params[0];
    //$this->model->borrarProducto($id);
    //header('Location: '.HOME);
  }

  public function finish($params)
  {
    $id_producto = $params[0];
    $this->model->finalizarProducto($id_producto);
    header('Location: '.HOME);
  }
  
  public function filtro()
  {
  //  var_dump($_POST);

    $id_marca = $_POST['id_marca'];
    $productos = $this->model->getFiltro($id_marca);
    $marcas = $this->marcasModel->getMarcas();

    for ($i=0; $i < count($productos); $i++) {
    $id_marca = $productos[$i]['id_marca'];// puede ser 1, 2, 3, etc son los id que envio con el formulario
    $j=0;
    while (( $j < count($marcas) && (!(isset($productos[$i]['marca']))) ) ) {
      if ($id_marca == $marcas[$j]['id']) {
        $productos[$i]['marca'] = $marcas[$j]['nombre'];
      }
      $j++;
    }
  }
  $usuario = false;
    session_start();
    if (isset($_SESSION['usuario'])) { // pregunto si tengo un usuario
      $usuario = true;
    }  
 
    $this->view->mostrarProductos($productos, $marcas, $usuario);
}

public function edit()
{
   if (isset($_POST['id_producto'])) {

      $id = $_POST['id_producto'];
      $productos=$this->model->getProducto($id);
      $this->view->mostraredit($productos);
   }
}
public function editar()
{
  $id = $_POST['id_producto'];
  $modelo = $_POST['modelo'];
  $memoria = $_POST['memoria'];
  $banda = $_POST['banda'];
  $consumo = $_POST['consumo'];
//  echo $id,$modelo,$memoria,$banda,$consumo;
  $this->model->editarProducto($modelo,$memoria,$banda,$consumo,$id);
   $this->comparativa();
   }

}

?>
