$(document).on('click', '.link-ajax', function () {
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

function getForm (datos) {
  event.preventDefault();

  var dir = $(datos).attr("href");
  var formData = new FormData(datos);

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
         // Reload la web completa
        window.location.reload();
      }
      else {
        $(".reemplazo").html(data);
      }
    }
  });
}

$(document).on('click','.borrarProducto', function(event){
  event.preventDefault();

  let idProducto = $(this).attr("href");
  let jsonProducto = {id_producto: idProducto};

  $.post("borrarProducto", jsonProducto, function(data) {
    $('.reemplazo').html(data);
  });

});

 $(document).on('click','.editarProducto', function(event){
      event.preventDefault();

      let idProducto = $(this).attr("href");
      let jsonProducto = {id_producto: idProducto};

      $.post("editarProducto", jsonProducto, function(data) {
        $('.reemplazo').html(data);
      });
  });