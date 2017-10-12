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
    if (isset($_SESSION['usuario'])) { // pregunto si tengo un usuario
      $usuario = $_SESSION['usuario'];
    }

    $this->view->mostrarIndex($usuario);
  }
  /*MUESTRO EL PARTIAL NVIDIA*/
  public function nvidia()
  {
    $this->view->mostrarNvidia();
  }
  /*MUESTRO EL PARTIAL ATI*/
  public function Ati()
  {
    $this->view->mostrarAti();
  }
  /*MUESTRO EL PARTIAL COMPARATIVA Y LE CARGO LOS PRODUCTOS*/
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
    if (isset($_SESSION['usuario'])) { // pregunto si tengo un usuario
      $usuario = true;
    }
    $this->view->mostrarProductos($productos, $marcas, $usuario);
  }
/*FUNCION Q GUARDA PRODUCTOS*/
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
      $this->comparativa();
    }
  }
  /*FUNCION Q BORRA PRODUCTOS*/
  public function destroy()
  {
     if (isset($_POST['id_producto'])) {

        $id = $_POST['id_producto'];
        $this->model->borrarProducto($id);
        $this->comparativa();
     }
  }
    /*FUNCION PARA FILTRAR POR MARCA PRODUCTOS*/
  public function filtro()
  {

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
    if (isset($_SESSION['usuario'])) { // pregunto si tengo un usuario
      $usuario = true;
    }

    $this->view->mostrarProductos($productos, $marcas, $usuario);
}

//ABRE LA PAGINA PARA EDITAR EL PRODUCTO
public function edit()
{
   if (isset($_POST['id_producto'])) {

      $id = $_POST['id_producto'];
      $productos=$this->model->getProducto($id);
      $this->view->mostraredit($productos);
   }
}

//EDITA EL PRODUCTO
public function editar()
{
  $id = $_POST['id_producto'];
  $modelo = $_POST['modelo'];
  $memoria = $_POST['memoria'];
  $banda = $_POST['banda'];
  $consumo = $_POST['consumo'];


  $this->model->editarProducto($modelo,$memoria,$banda,$consumo,$id);
  $this->comparativa();
  }



 /*FUNCION PARA AGREGAR UNA MARCA A LA TABLA*/
        public function agregarMarca(){
          if (isset($_POST['marca']) && !empty($_POST['marca'])){
          $marca=$_POST['marca'];
          $this->model->addmarca($marca);
          $this->comparativa();
        }else{
          $this->view->errorCrear("Campo incompleto");
          $this->comparativa();
        }
          }
  /*FUNCION Q BORRA MARCA*/
public function destroyMarca(){
  $id = $_POST['id_marca'];
  $this->model->deleteMarca($id);
  $this->comparativa();
}
  /*FUNCION QUE INICIA LA EDICION DE UNA MARCA*/
public function comienzoEditMarca()
{
  $id=$_POST['id_marca'];
  $marcas=$this->model->getMarca($id);
  $this->view->mostrarEditMarca($marcas);
}
  /*FUNCION Q NOS MUETRA YA LA EDICION REALIZADA*/
public function editarMarca()
{
  $id=$_POST['id_marca'];
  $nombre=$_POST['nombre'];
  $this->model->editMarca($id,$nombre);
  $this->comparativa();
}

 function traemeElbody(){
    $this->view->seeBody();
 }


}

?>
