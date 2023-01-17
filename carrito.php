<?php
 session_start();
 ?> 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

 <?php
 include("conexion.php");
 $consulta = "SELECT * FROM clientes WHERE codigo='" . $_SESSION["rut"] . "'";
 foreach ($con->query($consulta) as $row) {
        $idcli=$row["id"]; 
        $nomcli=$row["nombres"];          
 }
 $items=0;
 $total=0;   
 ?> 
 <div class="form-group" style="padding:10;">
 <label class="form-label" for="carrito">
 <h1><b>CARRITO DE COMPRAS <?php echo $nomcli; ?></b></h1>
 </label>
 <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col"><h3>Nº</h3></th>
      <th scope="col"><h3>Item</h3></th>
      <th scope="col"><h3>Valor</h3></th>      
    </tr>
  </thead>
  <tbody>       
    <?php   
    $consulta2 = "SELECT * FROM res_cabanas r join cabanas c on r.idcab=c.id WHERE idcli=" . $idcli . " and r.estado=0";
    foreach ($con->query($consulta2) as $row) {
       echo "<tr>";
       echo "<th scope='row'><h3>".($items+1)."</h3></th>";
       echo "<td><h3>Alojamiento Cabaña desde ".date("d-m-Y", strtotime($row["fechai"]))." hasta ".date("d-m-Y", strtotime($row["fechaf"]))."</h3></td>";
       echo "<td style='text-align:right;'><h3>$".number_format($row["valor"], 0, ',', '.')."</h3></td>";    
       echo "</tr>";
       $items+=1;     
       $total+=$row["valor"];  
    }     
    $consulta2 = "SELECT * FROM res_suites r join suites c on r.idsui=c.id WHERE idcli=" . $idcli . " and r.estado=0";
    foreach ($con->query($consulta2) as $row) {          
        echo "<tr>";
        echo "<th scope='row'><h3>".($items+1)."</h3></th>";
        echo "<td><h3>Alojamiento Suite desde ".date("d-m-Y", strtotime($row["fechai"]))." hasta ".date("d-m-Y", strtotime($row["fechaf"]))."</h3></td>";
        echo "<td style='text-align:right;'><h3>$".number_format($row["valor"], 0, ',', '.')."</h3></td>";    
        echo "</tr>";   
        $items+=1;       
        $total+=$row["valor"];    
    }
    $consulta2 = "SELECT * FROM res_masajes r join masajes c on r.idmas=c.id WHERE idcli=" . $idcli . " and r.estado=0";
    foreach ($con->query($consulta2) as $row) {          
        echo "<tr>";
        echo "<th scope='row'><h3>".($items+1)."</h3></th>";
        echo "<td><h3>Masaje ".$row["tipo"]." Fecha ".$row["fecha"]." Horario ".date("H:i", strtotime($row["idhor"]))."</h3></td>";
        echo "<td style='text-align:right;'><h3>$".number_format($row["valor"], 0, ',', '.')."</h3></td>";    
        echo "</tr>";   
        $items+=1;       
        $total+=$row["valor"];    
    }   
    echo "<tr>";
    echo "<th scope='row'></th>";
    echo "<td><h3>Total</h3></td>";
    echo "<td style='text-align:right;'><h3>$".number_format($total, 0, ',', '.')."</h3></td>";    
    echo "</tr>";        
    ?>       
    <tr>
    <th scope='row'></th>
    <td style='text-align:center;'>     
    <button type="button" class="btn btn-success" onclick="window.location.href='pagocarrito.php'"><h1>PAGAR</h1></button><img src="webpay.png" alt="webpay" width="180" height="90"></td>       
    <td>
    <BR>  
    <button type="button" class="btn btn-danger" onclick="window.close();"><h1>Salir</h1></button>  
    </td>
    </tr>         
  </tbody>
</table>
</div>
