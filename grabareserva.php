<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</HEAD>
<BODY>
<div class="container" style="padding:auto;margin:auto;border: 0px solid red;position: fixed;top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);text-align: center;">    
<?php

    session_start();
    $_SESSION["rut"]=$_POST["rut"];
    $_SESSION["nombre"]=$_POST["nombres"];
    $_SESSION["ciudad"]=$_POST["ciudad"];
    $_SESSION["fecha"]=$_POST["fecha_nacimiento"];
    $_SESSION["direccion"]=$_POST["direccion"];
    $_SESSION["telefono"]=$_POST["telefono"];
    $_SESSION["correo"]=$_POST["correo"];
    $_SESSION["horini"]=date('H:i:s');
    include("conexion.php");
    
    $idcli=0;
    $consulta = "SELECT * FROM clientes WHERE codigo='" . $_POST["rut"] . "'";
    foreach ($con->query($consulta) as $row) {
        $idcli=$row["id"];
    }
    if ($idcli==0){
       $sql = "INSERT INTO clientes (codigo,nombres,lugar_nacimiento,fecha_nacimiento,direccion,telefono,correo) VALUES ('" . $_POST["rut"] . "','" . $_POST["nombres"] . "','".$_POST["ciudad"] . "','".$_POST["fecha_nacimiento"]  . "','".$_POST["direccion"]. "','".$_POST["telefono"]."','". $_POST["correo"] ."')";
       //echo $sql;
       $insert = mysqli_query($con,$sql);
       $consulta = "SELECT * FROM clientes WHERE codigo='" . $_POST["rut"] . "'";
       foreach ($con->query($consulta) as $row) {
          $idcli=$row["id"];          
       }
    }
    if ($_POST["tipo"]==1){
       $tabla="res_cabanas";
       $tabla2="cabanas";
       $campo="idcab";
       $mensaje="cabaña";
    }
    if ($_POST["tipo"]==2||$_POST["tipo"]==3){
       $tabla="res_suites";
       $tabla2="suites";
       $campo="idsui";
       $mensaje="suite";
    }    
    $idalo=0;
    if ($tabla2=="cabanas"){
       $consulta = "SELECT id,numero FROM ".$tabla2;
       foreach ($con->query($consulta) as $row) {
         $consulta2 = "SELECT * FROM ".$tabla." WHERE ".$campo."=".$row["id"]. " order by fechaf desc";
         //echo $consulta2;
         $sw=0;         
         foreach ($con->query($consulta2) as $row2) {
               $fechaInicio=strtotime($_POST["initialDate"]);
               $fechaFin=strtotime($_POST["finishDate"]);
               for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){                
                  if (date("Y-m-d", $i)>=$row2["fechai"]&&date("Y-m-d", $i)<=$row2["fechaf"]){
                     $sw=1;                  
                     break;
                  }
               }
         }  
         if ($sw==0){
            $idalo=$row["id"]; 
         }        
         if ($idalo>0){
            break;
         }
       }   
    }else {
      //Suites

          $consulta2 = "SELECT * FROM ".$tabla." WHERE ".$campo."=".($_POST["tipo"]-1). " order by fechaf desc";       
          //echo $consulta2;
         
          $sw=0;   
          foreach ($con->query($consulta2) as $row2) {
               $fechaInicio=strtotime($_POST["initialDate"]);
               $fechaFin=strtotime($_POST["finishDate"]);
               for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){                
                  if (date("Y-m-d", $i)>=$row2["fechai"]&&date("Y-m-d", $i)<=$row2["fechaf"]){
                     $sw=1;                  
                     break;
                  }
               }
         }  
         if ($sw==0){
            $idalo=($_POST["tipo"]-1); 
         } 
         /*       
         if ($idalo>0){
            break;
         }
         */
       
    }   
    
    //exit;
    if ($idalo>0){    
    $fini=explode("-",$_POST["initialDate"]);
    $ini=$fini[2]."-".$fini[1]."-".$fini[0]; 
    $fter=explode("-",$_POST["finishDate"]);
    $ter=$fter[2]."-".$fter[1]."-".$fter[0]; 
    $sql = "INSERT INTO ".$tabla." (idcli,".$campo.",fechai,fechaf) VALUES (" . $idcli . ",".$idalo.",'" . $ini . "','" . $ter ."')";    
    $insert = mysqli_query($con,$sql);    
    if ($insert) {
       echo "<BR>";
       echo "<p style='color:black;font-weight: bold;height: 10px !important;text-align:left;margin-left:15%;'><h1>Reserva de ".utf8_encode($mensaje)."  Exitosa !!!</h1></p>";
       echo "</br>";       
    }
    }else{
       echo "<BR>";
       echo "<p style='color:black;font-weight: bold;height: 10px !important;text-align:left;margin-left:15%;'><h1>No hay alojamiento de ".$tabla2." disponible !!!</h1></p>";
       echo "</br>";
    }   
?>
</div>
<script>
function cerrar(){
  opener.location="https://thalassus.com/new/index.php";
window.close();
}   
setTimeout(cerrar, 3000);
</script>   
</BODY>
</HTML>
