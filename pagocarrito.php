 <?php
 session_start();
 ?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container" style="padding:auto;margin:auto;border: 0px solid red;position: fixed;top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);text-align: center;"> 
<?php
 
 //Validacion pago Webpay
 
 include("conexion.php");    
 $idcli=0;
 $consulta = "SELECT * FROM clientes WHERE codigo='" . $_SESSION["rut"] . "'";
 foreach ($con->query($consulta) as $row) {
        $idcli=$row["id"];
 }
 $sql = "UPDATE res_cabanas set estado=1 where idcli=".$idcli;    
 $update = mysqli_query($con,$sql);    
 $sql = "UPDATE res_suites set estado=1 where idcli=".$idcli;    
 $update = mysqli_query($con,$sql);    
 $sql = "UPDATE res_masajes set estado=1 where idcli=".$idcli;    
 $update = mysqli_query($con,$sql);     
 session_destroy();
 echo "<BR>";
 echo "<img src='vistobueno.png' alt='OK' width='200' height='180'>";
 echo "<p style='color:black;font-weight: bold;height: 10px !important;text-align:center;margin-left:15%;'><h2>Pago Exitoso !!!<h2></p>";
 echo "</br>";
?>
</div>
<script>function cerrar(){
  opener.location="https://thalassus.com/new/index.php";
window.close();
}   
setTimeout(cerrar, 3000);
</script>