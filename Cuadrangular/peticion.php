<?php
  require 'database.php';

  if (!empty($_POST['equipo1']) && !empty($_POST['equipo2']) && !empty($_POST['equipo3']) && !empty($_POST['equipo4'])) {
    
    $equipo1 = $_POST['equipo1'];
    $equipo2 = $_POST['equipo2'];
    $equipo3 = $_POST['equipo3'];
    $equipo4 = $_POST['equipo4'];

    $query = "INSERT INTO valores (equipo) VALUES ('$equipo1');";
    $query .= "INSERT INTO valores (equipo) VALUES ('$equipo2');";
    $query .= "INSERT INTO valores (equipo) VALUES ('$equipo3');";
    $query .= "INSERT INTO valores (equipo) VALUES ('$equipo4');";

    if ($conn->multi_query($query) === TRUE) {
        $message = 'EQUIPOS REGISTRADOS EXITOSAMENTE';
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;} 
  }
  else{
    echo "PORFAVOR INGRESE 4 EQUIPOS";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Cuadrangular/styles.css">
  <title>Document</title>
</head>
<body>

<div class="cuadrocss2">
        
        <h1>TABLA DE ENFRENTAMIENTO</h1>
        <h2>Porfavor ingrese los goles de los partidos:</h2>
        <form id="myform" action="tablafinal.php" method="POST" autocomplete="off">
            <!--ENFRENTAMIENTO 1-->
            <label class="eq1">Equipo 1:</label>
            <input type="text" name="part1eq1" placeholder="Ingrese los goles">
            <input type="text" name="part1eq2" placeholder="Ingrese los goles">
            <label class="eq2">:Equipo 2</label>
            <br>
            <!--ENFRENTAMIENTO 2-->
            <label class="eq1">Equipo 1:</label>
            <input type="text" name="part2eq1" placeholder="Ingrese los goles">
            <input type="text" name="part2eq3" placeholder="Ingrese los goles">
            <label class="eq3">:Equipo 3</label>
            <br>
            <!--ENFRENTAMIENTO 3-->
            <label class="eq1">Equipo 1:</label>
            <input type="text" name="part3eq1" placeholder="Ingrese los goles">
            <input type="text" name="part3eq4" placeholder="Ingrese los goles">
            <label class="eq4">:Equipo 4</label>
            <br>
            <!--ENFRENTAMIENTO 4-->
            <label class="eq2">Equipo 2:</label>
            <input type="text" name="part4eq2" placeholder="Ingrese los goles">
            <input type="text" name="part4eq3" placeholder="Ingrese los goles">
            <label class="eq3">:Equipo 3</label>
            <br>
            <!--ENFRENTAMIENTO 5-->
            <label class="eq2">Equipo 2:</label>
            <input type="text" name="part5eq2" placeholder="Ingrese los goles">
            <input type="text" name="part5eq4" placeholder="Ingrese los goles">
            <label class="eq4">:Equipo 4</label>
            <br>
            <!--ENFRENTAMIENTO 6-->
            <label class="eq3">Equipo 3:</label>
            <input type="text" name="part6eq3" placeholder="Ingrese los goles">
            <input type="text" name="part6eq4" placeholder="Ingrese los goles">
            <label class="eq4">:Equipo 4</label>
            <br>

            <input id= "Subirequipos" type="button" value="Validar" onclick="submitForm()">

        </form>
</div>

<script type="text/javascript">
var eq1 = <?php echo json_encode($equipo1); ?>;
var eq2 = <?php echo json_encode($equipo2); ?>;
var eq3 = <?php echo json_encode($equipo3); ?>;
var eq4 = <?php echo json_encode($equipo4); ?>;
document.getElementsByClassName('eq1')[0].innerHTML = eq1;
document.getElementsByClassName('eq1')[1].innerHTML = eq1;
document.getElementsByClassName('eq1')[2].innerHTML = eq1;
document.getElementsByClassName('eq2')[0].innerHTML = eq2;
document.getElementsByClassName('eq2')[1].innerHTML = eq2;
document.getElementsByClassName('eq2')[2].innerHTML = eq2;
document.getElementsByClassName('eq3')[0].innerHTML = eq3;
document.getElementsByClassName('eq3')[1].innerHTML = eq3;
document.getElementsByClassName('eq3')[2].innerHTML = eq3;
document.getElementsByClassName('eq4')[0].innerHTML = eq4;
document.getElementsByClassName('eq4')[1].innerHTML = eq4;
document.getElementsByClassName('eq4')[2].innerHTML = eq4;
</script>

<h3 id = "result-before"></h3>
<script>
           function submitForm() {
              document.getElementById("myform").submit();
              // document.getElementById("myform").reset();
           }
</script> 



