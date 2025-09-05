<?php

require_once "../models/TaskModel.php";

//TaskModel::all();
echo "<br><br><br>.Añadiendo otro elemento 1"."<br><br><br>";
//$tarea2 = new TaskModel(2,"prueba","probando....",2);
$tarea3 = new TaskModel(5,"Tareas","Esta es otra tarea",3);
$tarea3->save();
print_r($tarea3->all());
