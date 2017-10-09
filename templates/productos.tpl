<div class="table-responsive">
<table class="table table-striped centradoBlanco">
  <tr>
    <th><p >MARCA</p></th>
    <th><p >MODELO</p></th>
    <th><p >MEMORIA RAM (GB)</p></th>
    <th><p >ANCHO DE BANDA (GB/s)</p></th>
    <th><p >CONSUMO (W)</p></th>
    <th><p >BORRAR</p></th>
  </tr>
  {foreach from=$productos item=producto}
  <tr>
    <td><p>{$producto['marca']}</p></td>
    <td><p>{$producto['modelo']}</p></td>
    <td><p>{$producto['memoria']}</p></td>
    <td><p>{$producto['banda']}</p></td>
    <td><p>{$producto['consumo']}</p></td>
    <td>
      <div class="col-xs-12 col-sm-12 col-md-12">
      
        
          <a href="borrarProducto/{$producto['id']}">
           <p><span id="borrar" class="fa fa-trash-o " aria-hidden="true" value="0"></span></p>
          </a>
       
      </div>
    </td>
  </tr>
  {/foreach}
</table>
</div>



        <!--<ul class="list-group">
  {foreach from=$tareas item=tarea}
      <li class="list-group-item">
        {$tarea['titulo']} : {$tarea['descripcion']} -->
       <!-- <a href="borrarTarea/{$tarea['id_tarea']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
       <a href="finalizarTarea/{$tarea['id_tarea']}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>-->
<!--    </li>
  {/foreach}
</ul>-->