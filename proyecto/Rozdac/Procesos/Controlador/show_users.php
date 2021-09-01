<?php
function show_all(){
$actions = new actions();
$filas = $actions -> showUsers();
echo "<table>
          <tr>
          <th>Nombre</th>
          <th>Usuario</th>
          <th>Correo Electrónico</th>
          <th>Celular</th>
          <th>Dirección</th>
          <th colspan='2'>Acciones</th>
          </tr>";
          foreach ($filas as $fila){
           echo "<tr>";
           echo "<td>".$fila['name']. "</td>";
           echo "<td>".$fila['user']. "</td>";
           echo "<td>".$fila['email']. "</td>";
           echo "<td>".$fila['telefono']. "</td>";
           echo "<td>".$fila['direccion']. "</td>";
           echo "<td><a href='#'>Modificar</a></td>";
           echo "<td><a href='#'>Eliminar</a></td>";
           echo "</tr>";
        }
echo "</table>";
}

function show_part(){
        $actions = new actions();
        $filas = $actions -> showUsers();
        echo "<table>
                  <tr>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Correo Electrónico</th>
                  <th>Celular</th>
                  <th>Dirección</th>
                  <th colspan='2'>Acciones</th>
                  </tr>";
                  foreach ($filas as $fila){
                  if(!($fila['rol'] == 2 || $fila['rol'] == 3)){
                        echo "<tr>";
                        echo "<td>".$fila['name']. "</td>";
                        echo "<td>".$fila['user']. "</td>";
                        echo "<td>".$fila['email']. "</td>";
                        echo "<td>".$fila['telefono']. "</td>";
                        echo "<td>".$fila['direccion']. "</td>";
                        echo "<td><a href='#'>Modificar</a></td>";
                        echo "<td><a href='#'>Eliminar</a></td>";
                        echo "</tr>";

                  }
                }
        echo "</table>";
        }
?>
