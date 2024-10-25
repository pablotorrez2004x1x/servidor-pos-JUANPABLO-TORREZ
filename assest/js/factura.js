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

function busCliente(){
let nitCliente=document.getElementById("nitCliente").value

var obj={
    nitCliente:nitCliente
}

$.ajax({
    type:"POST",
    url:"controlador/clienteControlador.php?ctrBusCliente",
    data:obj,
    dataType:"json",
    success:function(data){

        if(data["email_cliente"]==""){
            document.getElementById("emailCliente").value="null"
        }else{
            document.getElementById("emailCliente").value=data["email_cliente"]
        }
        document.getElementById("rsCliente").value=data["razon_social_cliente"]
       numFactura()
    }
})
}
//generar numero de factura
function numFactura(){
    let obj=""

    $.ajax({
        type:"POST",
        url:"controlador/facturaControlador.php?ctrNumFactura",
        data:obj,
        success:function(data){
            document.getElementById("numFactura").value=data
        }
    })
}

function busProducto(){
    let codProducto=document.getElementById("codProducto").value

var obj={
    codProducto:codProducto
}

$.ajax({
    type:"POST",
    url:"controlador/productoControlador.php?ctrBusProducto",
    data:obj,
    dataType:"json",
    success:function(data){

        document.getElementById("conceptoPro").value=data["nombre_producto"];
        document.getElementById("uniMedida").value=data["unidad_medida"];
        document.getElementById("preUnitario").value=data["precio_producto"];
    }
})
}
function calcularPreProd(){
    let cantPro=parseInt(document.getElementById("cantProducto").value)
    let descProducto=parseInt(document.getElementById("descProducto").value)
    let preUnit=parseInt(document.getElementById("preUnitario").value)

    let preProducto=preUnit-descProducto

    document.getElementById("preTotal").value=preProducto*cantPro
}
