<?php
require_once "conexion.php";

class ModeloUsuario{

//acceso al sistema

    static public function mdlAccesoUsuario($usuario){
      $stmt=Conexion::conectar()->prepare("select * from usuario where login_usuario='$usuario'");
      $stmt->execute();

      return $stmt->fetch();

      $stmt->close();
      $stmt->null;
    }
    static public function mdlInfoUsuarios(){
      $stmt=Conexion::conectar()->prepare("select * from usuario");
      $stmt->execute();

      return $stmt->fetchAll();

      $stmt->close();
      $stmt->null;
}
}