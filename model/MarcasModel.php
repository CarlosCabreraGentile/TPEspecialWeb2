<?php
class MarcasModel extends Model
{
  function getMarcas(){
    $sentencia = $this->db->prepare( "select * from marca");//marca es la tabla de la BBDD
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

}
?>
