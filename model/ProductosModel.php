<?php
class ProductosModel extends Model
{
  function getProductos(){
    $sentencia = $this->db->prepare( "select * from producto");//producto es la tabla de la BBDD
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarProducto($id_marca,$modelo,$memoria,$banda,$consumo){

    $sentencia = $this->db->prepare('INSERT INTO producto(id_marca,modelo,memoria,banda,consumo) VALUES(?,?,?,?,?)');
    $sentencia->execute([$id_marca,$modelo,$memoria,$banda,$consumo]);
  }

  function borrarProducto($id){
    $sentencia = $this->db->prepare( "delete from producto where id=?");
    $sentencia->execute([$id]);
  }

  function finalizarProducto($id_producto)
  {
    $sentencia = $this->db->prepare( "update producto set completado=1 where id_producto=?");
    $sentencia->execute([$id_producto]);
  }
  function getFiltro($id_marca){
  $where="where id_marca ='".$id_marca."'";
  $sentencia = $this->db->prepare( "select * from producto " .$where);
  //producto es la tabla de la BBDD
  $sentencia->execute();
  return $sentencia->fetchAll(PDO::FETCH_ASSOC);
}
function getProducto($id){
  $where="where id ='".$id."'";
  $sentencia = $this->db->prepare("select * from producto " .$where);//producto es la tabla de la BBDD
  $sentencia->execute();
  return $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

 function editarProducto($modelo,$memoria,$banda,$consumo,$id)
{
  $sentencia = $this->db->prepare("UPDATE producto SET modelo = '".$modelo."', memoria = '".$memoria."', banda = '".$banda."', consumo = '".$consumo."' WHERE id = '".$id."'");
  $sentencia->execute([$modelo]);
}

}

 ?>
