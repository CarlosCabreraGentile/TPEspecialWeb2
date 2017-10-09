<div class="reemplazo">


  <div class="tablafondo">
    <!--HOME Presentation -->
    <div class="conthome2">
      <p>Comparativa entre ATI y NVidia</p>
    </div>
    <div class="container">
      <div class="filtrar form-group">

        <form method="POST" href="filtrar" class="formFiltrar">
          <label for="id_marca">Seleccione una marca</label>

          <select class="marca" name="id_marca">
            {foreach from=$marcas item=marca}
            <option class="marca" value="{$marca['id']}" name="id_marca">{$marca['nombre']}</option>
            {/foreach}
          </select>
          <input type="submit" class="btn btn-default" value="Filtrar Marca">
        </form>

      </div>
      <div class="table-responsive">
        <table class="table table-striped centradoBlanco">
          <tr>
            <th><p >MARCA</p></th>
            <th><p >MODELO</p></th>
            <th><p >MEMORIA RAM (GB)</p></th>
            <th><p >ANCHO DE BANDA (GB/s)</p></th>
            <th><p >CONSUMO (W)</p></th>
            {if $usuario}
            <th><p ></p></th>
            {/if}
          </tr>
          {foreach from=$productos item=producto}
          <tr>
            <td><p>{$producto['marca']}</p></td>
            <td><p>{$producto['modelo']}</p></td>
            <td><p>{$producto['memoria']}</p></td>
            <td><p>{$producto['banda']}</p></td>
            <td><p>{$producto['consumo']}</p></td>
            {if $usuario}
            <td>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="borrarEditarCentrado">
                      <div class="enLinea">
                        <a href="{$producto['id']}" class="borrarProducto">
                        <p><span id="borrar" class="fa fa-trash-o " aria-hidden="true" value="0"></span></p>
                        </a>
                      </div>
                      <div class="enLinea">
                        <a href="{$producto['id']}" class="editarProducto">
                        <p><span id="editar" class="fa fa-pencil-square-o " aria-hidden="true" value="0"></span></p>
                        </a>
                      </div>
                </div>      
             </div>
           </td>
           {/if}
         </tr>
         {/foreach}
       </table>
     </div>

   </div>
 </div>
 <div class="row">
  <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 formulario">
    <div class="msj">
      <div class="panel panel-default">
        <div class="panel-body">
        <form href="guardarProducto" class="formFiltrar">

            <div class="form-group">
              <label for="id_marca">Seleccione una marca</label>

              <select class="marca" name="id_marca">
                {foreach from=$marcas item=marca}
                <option class="marca" value="{$marca['id']}" name="id_marca">{$marca['nombre']}</option>
                {/foreach}
              </select>
            </div>
            <div class="form-group">
              <label for="modelo">Modelo</label>
              <input type="text" class="form-control" id="modelo" name="modelo"  placeholder="Modelo de VGA">
            </div>
            <div class="form-group">
              <label for="memoria">Memoria</label>
              <input type="text" class="form-control" id="memoria" name="memoria"  placeholder="Memoria">
            </div>
            <div class="form-group">
              <label for="banda">Ancho de Banda</label>
              <input type="text" class="form-control" id="banda" name="banda"  placeholder="Ancho de Banda">
            </div>
            <div class="form-group">
              <label for="consumo">Consumo</label>
              <input type="text" class="form-control" id="consumo" name="consumo"  placeholder="Consumo">
            </div>

            <input type="submit" class="btn btn-default" value="Crear">
            <div class="panel-footer">
             {if isset($error)}
             <div class="alert alert-danger" role="alert">{$error}</div>
             {/if}
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
