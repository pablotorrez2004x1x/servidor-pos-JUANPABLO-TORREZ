//variables golbales

var host="http://localhost:5000/"  

function verificarComunicacion(){

    var obj=""

    $.ajax({
        type:"POST",
        url:host+"api/CompraVenta/comunicacion",
        data:obj,
        cache:false,
        contentType:"aplication/json",
        processData:false,
        success:function(data){
            if(data["transaccion"]==true){
                document.getElementById("comunSiat").innerHTML="Conectado"
                document.getElementById("comunSiat").ClassName="badge badge-success"

            }
        }
}).fail(function(jqXHR, textStatus, errorThrown){
    if(jqXHR.status==0){
        document.getElementById("comunSiat").innerHTML="Desconectado"
        document.getElementById("comunSiat").ClassName="badge badge-danger"
    }
})
}

setInterval(verificarComunicacion,3000)