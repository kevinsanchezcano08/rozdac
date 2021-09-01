<?php
function show_business(){
$actions = new actions();
$filas = $actions -> showBusiness();
echo "<table>
          <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Misión</th>
          <th>Visión</th>
          <th>Propietario</th>
          <th colspan='2'>Acciones</th>
          </tr>";
          foreach ($filas as $fila){
           echo "<tr>";
           echo "<td>".$fila['name']. "</td>";
           echo "<td>".$fila['descripcion']. "</td>";
           echo "<td>".$fila['mision']. "</td>";
           echo "<td>".$fila['vision']. "</td>";
           echo "<td>".$fila['user']. "</td>";
           echo "<td><a href='#'>Ver</a></td>";
           echo "<td><a href='#'>Eliminar</a></td>";
           echo "</tr>";
        }
echo "</table>";
}
?>
