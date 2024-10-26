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

        document.getElementById("uniMedidaSin").value=data["unidad_medida_sin"];
        document.getElementById("codProductoSin").value=data["cod_producto_sin"];
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

//carrito
var arregloCarrito=[]
function agregarCarrito(){
let actEconomica=document.getElementById("actEconomica").value
let codProducto=document.getElementById("codProducto").value
let codProductoSin=document.getElementById("codProductoSin").value
let conceptoPro=document.getElementById("conceptoPro").value
let cantProducto=document.getElementById("cantProducto").value
let uniMedida=document.getElementById("uniMedida").value
let uniMedidaSin=document.getElementById("uniMedidaSin").value
let preUnitario=document.getElementById("preUnitario").value
let descProducto=document.getElementById("descProducto").value
let preTotal=document.getElementById("preTotal").value

let objDetalle={
    actividadEconomica:actEconomica,
    codigoProductoSin:codProductoSin,
    codigoProducto:codProducto,
    descripcion:conceptoPro,
    cantidad:cantProducto,
    unidadMedida:uniMedidaSin,
    precioUnitario:preUnitario,
    montoDescuento:descProducto,
    subtotal:preTotal
}

arregloCarrito.push(objDetalle)

}
function dibujarTablaCarrito(){
    
}
