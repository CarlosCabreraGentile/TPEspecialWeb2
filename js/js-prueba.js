/*FUNCION PARA NAVER GAR CON PARTIAL*/
$(document).on('click', '.link-ajax', function () {
  let url=$(this).attr("href");
  cargar(url);
});
$(document).on('click', '.refresh', function () {
  let url=$(this).attr("href");
  cargar(url);
});

function cargar(url) {
  $.ajax({
    url: url,
    method:"GET",
    dataType:"html",
    beforeSend:function(){
      $(".reemplazo").html("<h1><i class='fa fa-superpowers fa-spin'></i> Loading...</h1>");
    },
    success: function(data){
      if(url === "logout" ) {
        // Reload la web completa
        window.location.reload();
      }
      else {
        $(".reemplazo").html(data);
      }
    },
    error: function(){
      $(".reemplazo").html("<h1>Error - Request Failed!</h1>");
    }
  });
  event.preventDefault();
  return false;
}


$(document).on('submit','.formFiltrar', function(){
  getForm(this);
});
$(document).on('submit','.formAgregarMarca', function(){
  getForm(this);
});
/*FUNCIONES PARA REGISTRAR LO Q SE ENVIA POR formulario*/
function getForm (datos) {
  event.preventDefault();

  let dir = $(datos).attr("href");
  let formData = new FormData(datos);

  $.ajax({
    method: "POST",
    url: dir,
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      // Si el usuario está logueado refresco la web
      if(dir === "verificarUsuario" ) {
         // Si ingreso la contraseña
         if(data === "User pass error"){
          $("div .form-group").addClass('has-error');
          $("input").val("");
          $('#loginError').css('visibility', 'visible');
        }
        else{
          //Sino Reload la web completa
          window.location.reload();
        }
      }//Cierro el IF
      else{
        $(".reemplazo").html(data);
      }
    }//Cierro el SUCCESS
  });
}
/*FUNCIONES PARA ASIGNARLES EVENTOS A LOS BOTONES*/
$(document).on('click','.borrarProducto', function(event){
  event.preventDefault();

  let idProducto = $(this).attr("href");
  let jsonProducto = {id_producto: idProducto};

  $.post("borrarProducto", jsonProducto, function(data) {
    $('.reemplazo').html(data);
  });

});
/*FUNCIONES PARA ASIGNARLES EVENTOS A LOS BOTONES*/
$(document).on('click','.editarProducto', function(event){
  event.preventDefault();

  let idProducto = $(this).attr("href");
  let jsonProducto = {id_producto: idProducto};

  $.post("editarProducto", jsonProducto, function(data) {
    $('.reemplazo').html(data);
  });
});
/*FUNCIONES PARA ASIGNARLES EVENTOS A LOS BOTONES*/
$(document).on('click','.borrarMarca', function(event){
  event.preventDefault();

  let idMarca = $(this).attr("href");
  let jsonProducto = {id_marca: idMarca};

  $.post("borrarMarca", jsonProducto, function(data) {
    $('.reemplazo').html(data);
  });

});
/*FUNCIONES PARA ASIGNARLES EVENTOS A LOS BOTONES*/
$(document).on('click','.comienzoEditarMarca', function(event){
  event.preventDefault();

  let idMarca = $(this).attr("href");
  let jsonProducto = {id_marca: idMarca};

  $.post("comienzoEditarMarca", jsonProducto, function(data) {
    $('.reemplazo').html(data);
  });

});
