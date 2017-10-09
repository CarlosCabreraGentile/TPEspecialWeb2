<?php
class MarcasModel extends Model
{
  function getMarcas(){
    $sentencia = $this->db->prepare( "select * from marca");//marca es la tabla de la BBDD
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

/*  function guardarTarea($modelo, $memoria, $id_marca){
    $sentencia = $this->db->prepare('INSERT INTO producto(modelo,memoria, id_marca) VALUES(?,?,?)');
    $sentencia->execute([$modelo,$memoria,$id_marca]);
  }

  function borrarTarea($id_producto){
    $sentencia = $this->db->prepare( "delete from tarea where id_producto=?");
    $sentencia->execute([$id_producto]);
  }

  function finalizarTarea($id_producto)
  {
    $sentencia = $this->db->prepare( "update producto set completado=1 where id_producto=?");
    $sentencia->execute([$id_producto]);
  }
*/
}

 ?>
