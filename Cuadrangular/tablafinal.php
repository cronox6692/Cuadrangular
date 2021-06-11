<?php
  require 'database.php';

  if (!empty($_POST['part1eq1']) && !empty($_POST['part2eq1']) && !empty($_POST['part3eq1']) && !empty($_POST['part4eq2']) && !empty($_POST['part5eq2']) && !empty($_POST['part6eq3'])) {
    
    $res[0] = intval($_POST['part1eq1']); //11
    $res[1] = intval($_POST['part2eq1']);  //12
    $res[2] = intval($_POST['part3eq1']);  //13

    $res1[0] = intval($_POST['part1eq2']);  //21
    $res[3] = intval($_POST['part4eq2']);  //22
    $res[4] = intval($_POST['part5eq2']);  //23

    $res1[1] = intval($_POST['part2eq3']);  //31
    $res1[3] = intval($_POST['part4eq3']);  //32
    $res[5] = intval($_POST['part6eq3']);  //33

    $res1[2] = intval($_POST['part3eq4']);  //41
    $res1[4] = intval($_POST['part5eq4']);  //42
    $res1[5] = intval($_POST['part6eq4']);  //43

    //Goles a favor
    $GF_eq1 = $res[0] + $res[1] + $res[2];
    $GF_eq2 = $res1[0] + $res[3] + $res[4];
    $GF_eq3 = $res1[1] + $res1[3] + $res[5];
    $GF_eq4 = $res1[2] + $res1[4] + $res1[5];

    //goles en contra
    $GC_eq1 = $res1[0] + $res1[1] + $res1[2];
    $GC_eq2 = $res[0] + $res1[3] + $res1[4];
    $GC_eq3 = $res[1] + $res[3] + $res1[5];
    $GC_eq4 = $res[2] + $res[4] + $res[5];

    //diferencia de goles
    $DG_eq1 = $GF_eq1 - $GC_eq1;
    $DG_eq2 = $GF_eq2 - $GC_eq2;
    $DG_eq3 = $GF_eq3 - $GC_eq3;
    $DG_eq4 = $GF_eq4 - $GC_eq4;
    
    $ganar_eq = array(0,0,0,0,0,0);
    $perder_eq = array(0,0,0,0,0,0);
    $puntos_eq = array(0,0,0,0,0,0);
    $ganar_eq1 = array(0,0,0,0,0,0);
    $perder_eq1 = array(0,0,0,0,0,0);
    $puntos_eq1 = array(0,0,0,0,0,0);
    $empate_eq = array(0,0,0,0,0,0);
    $empate_eq1 = array(0,0,0,0,0,0);

    for($i=0; $i <= 5; $i++) {
        if($res[$i]>$res1[$i]){
            $ganar_eq[$i] = $ganar_eq[$i] + 1;
            $perder_eq1[$i] = $perder_eq1[$i] + 1;
            $puntos_eq[$i] = $puntos_eq[$i] + 3;
        } elseif ($res[$i]<$res1[$i]) {
            $ganar_eq1[$i] = $ganar_eq1[$i] + 1;
            $perder_eq[$i] = $perder_eq[$i] + 1;
            $puntos_eq1[$i] = $puntos_eq1[$i] + 3;
        } else {
            $empate_eq[$i] = $empate_eq[$i] + 1;
            $empate_eq1[$i] = $empate_eq1[$i] + 1;
            $puntos_eq[$i] = $puntos_eq[$i] + 1;
            $puntos_eq1[$i] = $puntos_eq1[$i] + 1;
        }
    }

   

    $ganados_eq1 = $ganar_eq[0] + $ganar_eq[1] + $ganar_eq[2];
    $perdidos_eq1 = $perder_eq[0] + $perder_eq[1] + $perder_eq[2];
    $empates_eq1 = $empate_eq[0] + $empate_eq[1] + $empate_eq[2];
    $puntos_finales_eq1 = $puntos_eq[0] + $puntos_eq[1] + $puntos_eq[2];

    $ganados_eq2 = $ganar_eq1[0] + $ganar_eq[3] + $ganar_eq[4];
    $perdidos_eq2 = $perder_eq1[0] + $perder_eq[3] + $perder_eq[4];
    $empates_eq2 = $empate_eq1[0] + $empate_eq[3] + $empate_eq[4];
    $puntos_finales_eq2 = $puntos_eq1[0] + $puntos_eq[3] + $puntos_eq[4];

    $ganados_eq3 = $ganar_eq1[1] + $ganar_eq1[3] + $ganar_eq[5];
    $perdidos_eq3 = $perder_eq1[1] + $perder_eq1[3] + $perder_eq[5];
    $empates_eq3 = $empate_eq1[1] + $empate_eq1[3] + $empate_eq[5];
    $puntos_finales_eq3 = $puntos_eq1[1] + $puntos_eq1[3] + $puntos_eq[5];

    $ganados_eq4 = $ganar_eq1[2] + $ganar_eq1[4] + $ganar_eq1[5];
    $perdidos_eq4 = $perder_eq1[2] + $perder_eq1[4] + $perder_eq1[5];
    $empates_eq4 = $empate_eq1[2] + $empate_eq1[4] + $empate_eq1[5];
    $puntos_finales_eq4 = $puntos_eq1[2] + $puntos_eq1[4] + $puntos_eq1[5];

    $sql = "INSERT INTO valores (equipo) VALUES ('-')";
    if ($conn->query($sql) === TRUE) {
      $ultimo_id = $conn->insert_id;
      
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $id_obj = intval($ultimo_id) - 4;
    $id_obj3 = $id_obj + 3;
    
    $query= "SELECT id, equipo FROM valores WHERE id BETWEEN $id_obj AND $id_obj3 ";
    $resultado = $conn->query($query);
    if ($resultado->num_rows > 0) {
      $cont = 0;

      while($row = $resultado->fetch_assoc()) {
        //echo "id: " . $row["id"]. " con equipo: " . $row["equipo"]. "<br>";
        $nombres_eq[$cont] = $row["equipo"];
        $cont++;
      }
    } else {
      echo "Ha ocurrido un error en la consulta, porfavor vuelva a introducir los equipos.";
    }

    // ARMAR TABLA PARA ORDENAR

    $final_eq[0] = [$nombres_eq[0], $puntos_finales_eq1, $ganados_eq1, $perdidos_eq1, $empates_eq1, $GF_eq1, $GC_eq1, $DG_eq1];
    $final_eq[1] = [$nombres_eq[1], $puntos_finales_eq2, $ganados_eq2, $perdidos_eq2, $empates_eq2, $GF_eq2, $GC_eq2, $DG_eq2];
    $final_eq[2] = [$nombres_eq[2], $puntos_finales_eq3, $ganados_eq3, $perdidos_eq3, $empates_eq3, $GF_eq3, $GC_eq3, $DG_eq3];
    $final_eq[3] = [$nombres_eq[3], $puntos_finales_eq4, $ganados_eq4, $perdidos_eq4, $empates_eq4, $GF_eq4, $GC_eq4, $DG_eq4];
    //var_dump($final_eq);
    $ordenador = [$puntos_finales_eq1, $puntos_finales_eq2, $puntos_finales_eq3, $puntos_finales_eq4];
    rsort($ordenador);

    for($j=0; $j <= 3; $j++) {
      for($k=0;$k <=3; $k++){
        if($final_eq[$k][1] == $ordenador[$j]){
            $ordenados[$j] = $final_eq[$k];
            $final_eq[$k][1] = 'a';
            break 1;
        }
      }
    }
  

    $str1 = implode(',',$ordenados[0]);
    $name_eq1 = $ordenados[0][0];
    $str1[0] = 0;
    $int1 = array_map(fn(string $x1): int => (int) $x1, explode(',', $str1));

    $str2 = implode(',',$ordenados[1]);
    $name_eq2 = $ordenados[1][0];
    $str2[0] = 0;
    $int2 = array_map(fn(string $x2): int => (int) $x2, explode(',', $str2));

    $str3 = implode(',',$ordenados[2]);
    $name_eq3 = $ordenados[2][0];
    $str3[0] = 0;
    $int3 = array_map(fn(string $x3): int => (int) $x3, explode(',', $str3));

    $str4 = implode(',',$ordenados[3]);
    $name_eq4 = $ordenados[3][0];
    $str4[0] = 0;
    $int4 = array_map(fn(string $x4): int => (int) $x4, explode(',', $str4));

    $id_obj1 = $id_obj + 1;
    $id_obj2 = $id_obj + 2;

    $query = "UPDATE valores SET equipo='$name_eq1', puntos=$int1[1], ganados=$int1[2], perdidos=$int1[3], empates=$int1[4], goles_favor=$int1[5], goles_contra=$int1[6], diferencia_goles=$int1[7] WHERE id=$id_obj;";
    $query .= "UPDATE valores SET equipo='$name_eq2', puntos=$int2[1], ganados=$int2[2], perdidos=$int2[3], empates=$int2[4], goles_favor=$int2[5], goles_contra=$int2[6], diferencia_goles=$int2[7] WHERE id=$id_obj1;";
    $query .= "UPDATE valores SET equipo='$name_eq3', puntos=$int3[1], ganados=$int3[2], perdidos=$int3[3], empates=$int3[4], goles_favor=$int3[5], goles_contra=$int3[6], diferencia_goles=$int3[7] WHERE id=$id_obj2;";
    $query .= "UPDATE valores SET equipo='$name_eq4', puntos=$int4[1], ganados=$int4[2], perdidos=$int4[3], empates=$int4[4], goles_favor=$int4[5], goles_contra=$int4[6], diferencia_goles=$int4[7] WHERE id=$id_obj3;";
    

    if ($conn->multi_query($query) === TRUE) {
        $message = 'RESULTADOS INGRESADOS EXITOSAMENTE';
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;} 
  }
  else{

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
<div class="cuadrocss">

<h1>¡Estos son los resultados!</h1>

<table class="tablas">

<tr>
  <th>Equipo</th>
  <th>Pts</th>
  <th>G</th>
  <th>E</th>
  <th>P</th>
  <th>GF</th>
  <th>GC</th>
  <th>DG</th>
</tr>

<tr>
  <td class ="part1">-</td>
  <td class ="part1">-</td>
  <td class ="part1">-</td>
  <td class ="part1">-</td>
  <td class ="part1">-</td>
  <td class ="part1">-</td>
  <td class ="part1">-</td>
  <td class ="part1">-</td>
</tr>

<tr>
  <td class ="part2">-</td>
  <td class ="part2">-</td>
  <td class ="part2">-</td>
  <td class ="part2">-</td>
  <td class ="part2">-</td>
  <td class ="part2">-</td>
  <td class ="part2">-</td>
  <td class ="part2">-</td>
</tr>

<tr>
  <td class ="part3">-</td>
  <td class ="part3">-</td>
  <td class ="part3">-</td>
  <td class ="part3">-</td>
  <td class ="part3">-</td>
  <td class ="part3">-</td>
  <td class ="part3">-</td>
  <td class ="part3">-</td>
</tr>

<tr>
  <td class ="part4">-</td>
  <td class ="part4">-</td>
  <td class ="part4">-</td>
  <td class ="part4">-</td>
  <td class ="part4">-</td>
  <td class ="part4">-</td>
  <td class ="part4">-</td>
  <td class ="part4">-</td>
</tr>

</table>
<input id= "final" type="button" value="Volver al inicio" onclick="window.location.href='/Cuadrangular/index.php'">

</div>


<script type="text/javascript">
var final = <?php echo json_encode($ordenados); ?>;

document.getElementsByClassName('part1')[0].innerHTML = final[0][0];
document.getElementsByClassName('part1')[1].innerHTML = final[0][1];
document.getElementsByClassName('part1')[2].innerHTML = final[0][2];
document.getElementsByClassName('part1')[3].innerHTML = final[0][3];
document.getElementsByClassName('part1')[4].innerHTML = final[0][4];
document.getElementsByClassName('part1')[5].innerHTML = final[0][5];
document.getElementsByClassName('part1')[6].innerHTML = final[0][6];
document.getElementsByClassName('part1')[7].innerHTML = final[0][7];

document.getElementsByClassName('part2')[0].innerHTML = final[1][0];
document.getElementsByClassName('part2')[1].innerHTML = final[1][1];
document.getElementsByClassName('part2')[2].innerHTML = final[1][2];
document.getElementsByClassName('part2')[3].innerHTML = final[1][3];
document.getElementsByClassName('part2')[4].innerHTML = final[1][4];
document.getElementsByClassName('part2')[5].innerHTML = final[1][5];
document.getElementsByClassName('part2')[6].innerHTML = final[1][6];
document.getElementsByClassName('part2')[7].innerHTML = final[1][7];

document.getElementsByClassName('part3')[0].innerHTML = final[2][0];
document.getElementsByClassName('part3')[1].innerHTML = final[2][1];
document.getElementsByClassName('part3')[2].innerHTML = final[2][2];
document.getElementsByClassName('part3')[3].innerHTML = final[2][3];
document.getElementsByClassName('part3')[4].innerHTML = final[2][4];
document.getElementsByClassName('part3')[5].innerHTML = final[2][5];
document.getElementsByClassName('part3')[6].innerHTML = final[2][6];
document.getElementsByClassName('part3')[7].innerHTML = final[2][7];

document.getElementsByClassName('part4')[0].innerHTML = final[3][0];
document.getElementsByClassName('part4')[1].innerHTML = final[3][1];
document.getElementsByClassName('part4')[2].innerHTML = final[3][2];
document.getElementsByClassName('part4')[3].innerHTML = final[3][3];
document.getElementsByClassName('part4')[4].innerHTML = final[3][4];
document.getElementsByClassName('part4')[5].innerHTML = final[3][5];
document.getElementsByClassName('part4')[6].innerHTML = final[3][6];
document.getElementsByClassName('part4')[7].innerHTML = final[3][7];


</script>

</body>
</html>
</body>
</html>