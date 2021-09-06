<?php
function show_business(){
$negoClass = new negoClass();
$filas = $negoClass -> showBusiness();
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
function find_business($name){
        $negoClass = new negoClass();
        $filas = $negoClass -> findBusiness($name);
        echo "<table>
        <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Misión</th>
        <th>Visión</th>
        <th>Propietario</th>
        <th colspan='2'>Acciones</th>
        </tr>";
        if(isset($filas)){
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
}else{
        echo "<tr>";  
        echo "<td colspan='5'>No se ha encontrado ningún negocio</td>";
        echo "</tr>"; 
        }
echo "</table>";
}
?>
