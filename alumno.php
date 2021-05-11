
<?php



    $id = $_POST["id"];
    $fechi = $_POST["fechi"];
    $fechf= $_POST["fechf"];
    
    $con = new mysqli("localhost", "root", "root", "phpxml");
    
    $resp = mysqli_query($con, "select * from venta where idcliente='".$id."' and fecha between '".$fechi. "' and '".$fechf. "' ");
    if($resp){
        $xml = new DOMDocument("1.0");
    $xml->formatOutput=true;
    $fitness=$xml->createElement("Ventas");
    $xml->appendChild($fitness);
    while($row=mysqli_fetch_array($resp)){
        $Venta=$xml->createElement("Venta");
        $fitness->appendChild($Venta);
         
        $idventa=$xml->createElement("Id", $row['idventa']);
        $Venta->appendChild($idventa);
         
        $fecha=$xml->createElement("Fecha", $row['fecha']);
        $Venta->appendChild($fecha);
         
        $tdoc=$xml->createElement("Documento", $row['tipodoc']);
        $Venta->appendChild($tdoc);
         
        $ndoc=$xml->createElement("Numero", $row['numdoc']);
        $Venta->appendChild($ndoc);
        
    }
    echo "<xmp>".$xml->saveXML()."</xmp>";
   
    }else{
        echo "Error...!";
    }




?>