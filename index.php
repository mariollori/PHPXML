
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Document</title>
    

</head>

<body>
    <h1>Reporte de Ventas</h1>
    <div class="container">
    <form>
        
        <label>Fecha Inicial: </label>
        <input class="item" id="fechi" value="2019-11-01" type="date">
        <label>Fecha Final: </label>
        <input class="item" id="fechf" type="date">
        <label>Cliente: </label>
        <select class="item" id="id">
          <option value="null"></option>
        <?php
   
    
   $con = new mysqli("localhost", "root", "root", "phpxml");
    
   $resp = mysqli_query($con, "select idcliente ,nombres from cliente");
   
      
   while($row=mysqli_fetch_array($resp)){
       
            $id= $row["idcliente"];
            $name= $row["nombres"];
       
      echo "<option value='" . $id . "'>" . $name . "</option>";
   }
   
   

?>
            
        </select>
        <input  type="button" class="enviar" id="enviar" value="Generar Reporte XML" >
      </form>
    </div>
    <div class="container2">
        <div class="list-fac" id="fac">
           
        </div>

    </div>
    <script  src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   
    <script>
     
     document.getElementById("enviar").addEventListener('click', dos);

     function dos(){
       var idd =  document.getElementById("id").value;
       var fechain= document.getElementById("fechi").value;
       var fechaf = document.getElementById("fechf").value;
         $.ajax({
            url:"alumno.php",
            type: "post", 
           data: {id: idd, fechi: fechain, fechf: fechaf},
            success:function(result){
                document.getElementById("fac").innerHTML=result;

             
           }
         })

         

       
 
     }
     
    
  
 
   </script>

</body>

</html>