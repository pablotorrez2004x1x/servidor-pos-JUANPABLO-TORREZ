function MNuevoUsuario(){
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/usuario/FNuevoUsuario.php",
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })

}

function regUsuario(){

    
}