<?php
require_once "../../controlador/facturaControlador.php";
require_once "../../modelo/facturaModelo.php";

$id=$_GET["id"];

$factura=ControladorFactura::ctrInfoFactura($id);

?>

<div class="modal-header bg-info">
              <h4 class="modal-title">Informacion de factura</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                <table class="table">
                    <tr>
                        <th># Factura:</th>
                        <td><?php echo $factura["cod_factura"];?></td>
                    </tr>
                    <tr>
                        <th>Cliente:</th>
                        <td><?php echo $factura["razon_social_cliente"]." - ".$factura["nit_ci_cliente"];?></td>
                    </tr>
                    <tr>
                        <th>fecha:</th>
                        <td><?php echo $factura["fecha_emision"];?></td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
                        <td><?php 
                if($factura["estado_factura"]==1){
                  ?>
                  <span class="badge badge-success">Emitido</span>
                  <?php
                }else{
                  ?>
                   <span class="badge badge-danger">anulado</span>
                   <?php
                }
                ?></td>
                    </tr>
                    <tr>
                        <th>Emitido por:</th>
                        <td><?php echo $factura["usuario"];?></td>
                    </tr>
                 
                   
                </table>
                    </div>
                    <div class="col-sm-6" style="text-align:center">

            
                                   </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
</div>