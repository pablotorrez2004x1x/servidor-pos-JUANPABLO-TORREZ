
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
         <!-- /.card -->

         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de facturas emitidas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th># Factura</th>
                    <th>Cliente</th>
                    <th>Emitido</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <td>
                        <a href="FormVenta" class="btn btn-primary">Nuevo</a>
                </td>
                </tr>
                  </thead>
           <tbody>
            <?php
           $factura=ControladorFactura::ctrInfoFacturas();
          foreach($factura as $value){
            ?>

            <tr>
                <td><?php echo $value["cod_factura"];?></td>
                <td><?php echo $value["razon_social_cliente"];?></td>
                <td><?php echo $value["fecha_emision"];?></td>
                <td><?php echo $value["total"];?></td>
        

                <td><?php 
                if($value["estado_factura"]==1){
                  ?>
                  <span class="badge badge-success">emitido</span>
                  <?php
                }else{
                  ?>
                   <span class="badge badge-danger">anulada</span>
                   <?php
                }
                ?> </td>    
                <td>
                    <div class="btn-group">
                 <button class="btn btn-info" onclick="MVERFactura(<?php echo $value["id_factura"];?>)">
                    <i class="fas fa-eye"></i>
                 </button>
               
                 <button class="btn btn-danger" onclick="MEliFactura('<?php echo $value["cuf"];?>')">
                    <i class="fas fa-trash"></i>
                 </button>
                 <a href="vista/factura/ImpFactura.php?id=<?php echo $value["id_factura"];?>" class="btn btn-success" target="_blank">
                  <i class="fas fa-print"></i>
                 </a>
                    </div>
                </td>      
            </tr>
          <?php
          }
          ?>
           
           </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        