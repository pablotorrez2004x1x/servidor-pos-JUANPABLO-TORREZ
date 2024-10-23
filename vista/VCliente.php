
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <!-- /.card -->

         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de clientes registrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Razon Social</th>
                    <th>nit/CI</th>
                    <th>Direccion</th>
                    <th>Nombre</th>
                    <th>Contactos</th>
                    <td>
                    <button class="btn btn-primary" onclick="MNuevoCliente()">Nuevo</button>
                </td>
                </tr>
                  </thead>
           <tbody>
            <?php
           $cliente=ControladorCliente::ctrInfoClientes();
          foreach($cliente as $value){
            ?>

            <tr>
                <td><?php echo $value["id_cliente"];?></td>
                <td><?php echo $value["razon_social_cliente"];?></td>
                <td><?php echo $value["nit_ci_cliente"];?></td>
                <td><?php echo $value["rdireccion_cliente"];?></td>
                <td><?php echo $value["nombre_cliente"];?></td>
                <td><?php echo $value["telefono_cliente"]."-".$value["email_cliente"];?></td>

                <td><?php 
                if($value["estado"]==1){
                  ?>
                  <span class="badge badge-success">Activo</span>
                  <?php
                }else{
                  ?>
                   <span class="badge badge-danger">Inactivo</span>
                   <?php
                }
                ?></td>
                <td><?php echo $value["ultimo_login"];?></td>
                <td><?php echo $value["fecha_registro"];?></td>      
                <td>
                    <div class="btn-group">
                 <button class="btn btn-secondary" onclick="MEditCliente(<?php echo $value["id_cliente"];?>)">
                    <i class="fas fa-edit"></i>
                 </button>
                 <button class="btn btn-danger" onclick="MEliCliente(<?php echo $value["id_cliente"];?>)">
                    <i class="fas fa-trash"></i>
                 </button>
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
        