 <?php
 session_start();
 if (!isset($_SESSION["rut"])){
 $rut = $_SESSION["rut"];
 include("conexion.php");
 $consulta = "SELECT * FROM clientes WHERE codigo='" . $rut . "'";
 foreach ($con->query($consulta) as $row) {
         $idcli=$row["id"];          
 }
 //echo $idcli;
 $sql = "DELETE FROM res_cabanas where idcli=".$idcli." and estado=0";    
 $update = mysqli_query($con,$sql);    
 $sql = "DELETE FROM res_suites where idcli=".$idcli." and estado=0";    
 $update = mysqli_query($con,$sql);
 $sql = "DELETE FROM res_masajes where idcli=".$idcli." and estado=0";    
 $update = mysqli_query($con,$sql);
 session_destroy(); 
 } 
 echo "<script>window.location.href='https://thalassus.com/new/index.php'</script>";
 //header('Location: https://thalassus.com/new/index.php');
 ?>