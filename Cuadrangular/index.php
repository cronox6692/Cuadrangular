<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<div class="puntos">
    <link rel="stylesheet" href="/Cuadrangular/styles.css">
</head>  

<body>

<div class="cuadrocss">
        <h1>TABLA DE ENFRENTAMIENTO</h1>
        <h2>Porfavor ingrese los goles de los partidos:</h2>
        <form id="myform" action="peticion.php" method="POST" autocomplete="off">
            <!--equipo 1-->
            <label for="equipo 1">Equipo 1:</label>
            <input type="text" name="equipo1" placeholder="Ingrese el equipo 1">
            <br>
            <!--equipo 2-->
            <label for="equipo 2">Equipo 2:</label>
            <input type="text" name="equipo2" placeholder="Ingrese el equipo 2">
            <br>
            <!--equipo 3-->
            <label for="equipo 3">Equipo 3:</label>
            <input type="text" name="equipo3" placeholder="Ingrese el equipo 3">
            <br>
            <!--equipo 4-->
            <label for="equipo 4">Equipo 4:</label>
            <input type="text" name="equipo4" placeholder="Ingrese el equipo 4">
            
            <br>
            <input id= "Subirequipos" type="button" value="Ingresar equipos" onclick="submitForm()">

        </form>
</div>

<script>
           function submitForm() {
              document.getElementById("myform").submit();
              // document.getElementById("myform").reset();
           }
</script>
    
</body>
</html>