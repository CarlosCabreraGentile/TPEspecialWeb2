function guardarInformacion(){
  $("#enviar").on("click",function(event){
  event.preventDefault();
  let grupo =32;
  let marca = $("#marca").val();
  let modelo = $("#modelo").val();
  let memoria = $("#memoria").val();
  let banda = $("#banda").val();
  let consumo = $("#consumo").val();
  //la estructura que debemos enviar es especifica de cada servicio que usemos
  //en este caso un hay que enviar un objeto con el numero de grupo y con lo que queramos guardarInformacion
  //thing puede ser un objeto JSON con tanta información como queramos (en este servicio)
  let info = {
      group: grupo,
      thing: {
            marca:marca,
            modelo:modelo,
            memoria:memoria,
            banda:banda,
            consumo:consumo,
            }
 //puede ser un objeto JSON!
      };

  if (marca && modelo && memoria && banda && consumo){
    $.ajax({
       method: "POST",
       dataType: 'JSON',
       //se debe serializar (stringify) la informacion (el "data:" de ida es de tipo string)
       data: JSON.stringify(info),
       contentType: "application/json; charset=utf-8",
       url: "https://web-unicen.herokuapp.com/api/thing",
       success: function(resultData){
         $("#guardarAlert").removeClass("alert-danger")
         $("#guardarAlert").addClass("alert-success")
         //como le dimos dataType:"JSON" el resultData ya es un objeto
         //la estructura que devuelve es especifica de cada servicio que usemos
         $("#guardarAlert").html("Informacion guardada con ID=" + resultData.information._id);
         console.log(resultData);
         getInformationByGroup();
         $("#marca").val("");
         $("#modelo").val("");
         $("#memoria").val("");
         $("#banda").val("");
         $("#consumo").val("");
       },
       error:function(jqxml, status, errorThrown){
         console.log(errorThrown);
         $("#guardarAlert").addClass("alert-danger")
         $("#guardarAlert").html("Error por favor intente mas tarde");
       }
    });
  }
  else
  {
    $("#guardarAlert").addClass("alert-danger")
    $("#guardarAlert").html("Grupo e Informacion son campos requeridos");
  }
});
}

$("#pedir").on("click",function(){
  getInformationByGroup();
});
function getInformationByGroup(){
  event.preventDefault();
  let grupo = 32;
  $.ajax({
     method: "GET",
     dataType: 'JSON',
     url: "https://web-unicen.herokuapp.com/api/thing/group/" + grupo,
     success: function(resultData){
       //al ser tipo JSON resultData es un objeto listo para usar
       let marca = "";
       let modelo ="";
       let memoria ="";
       let banda = "";
       let consumo = "";
       for (let i = 0; i < resultData.information.length; i++) {
         marca= resultData.information[i]['thing'].marca ;
         modelo= resultData.information[i]['thing'].modelo ;
         memoria= resultData.information[i]['thing'].memoria ;
         banda= resultData.information[i]['thing'].banda ;
         consumo= resultData.information[i]['thing'].consumo ;
         $(".marca"+i).html(marca);
         $(".modelo"+i).html(modelo);
         $(".memoria"+i).html(memoria);
         $(".banda"+i).html(banda);
         $(".consumo"+i).html(consumo);
       }

     },
     error:function(jqxml, status, errorThrown){
       console.log(errorThrown);
     }
  });
  }


function borrar(){
  $(".botonBorrar").on("click",function(event){
  event.preventDefault();
  let grupo = 32;
  let ide=$(this).attr("name");
  let a = parseInt(ide);
  $.ajax({
     method: "GET",
     dataType: 'JSON',
     url: "https://web-unicen.herokuapp.com/api/thing/group/" + grupo,
     success: function(resultData){
          let ideParaBorrar="";
          ideParaBorrar= resultData.information[a]['_id'] ;
          $.ajax({
             method: "DELETE",
             dataType: 'JSON',
             url: "https://web-unicen.herokuapp.com/api/thing/"+ideParaBorrar ,
             success: function(resultData){
               //al ser tipo JSON resultData es un objeto listo para usar
                  borrar_datos();
                  getInformationByGroup();
             },
             error:function(jqxml, status, errorThrown){
               console.log(errorThrown);
             }
          });
     },
     error:function(jqxml, status, errorThrown){
       console.log(errorThrown);
      }
     });

  });
}
function borrar_datos(){
  let marcaPlaca= "";
  let modeloPlaca ="";
  let memoriaPlaca ="";
  let bandaPlaca = "";
  let consumoPlaca = "";
  for (let i = 0; i < 8; i++) {
    $(".marca"+i).html(marcaPlaca);
    $(".modelo"+i).html(modeloPlaca);
    $(".memoria"+i).html(memoriaPlaca);
    $(".banda"+i).html(bandaPlaca);
    $(".consumo"+i).html(consumoPlaca);
  }
}
