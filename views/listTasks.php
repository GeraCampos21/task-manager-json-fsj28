<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion de Tareas</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>
<body>
  <?php
      require_once "../controller/ManagerController.php";
      $data_tasks = ManagerController::getTask();
      //print_r($data_tasks);
  ?>
  
  <main class="container">
    <h1>Lista de Tareas</h1>
    <!-- corregido: href en lugar de ref -->
    <a href="./createTask.php" class="btn btn-primary my-4">Crear Tarea</a>
    
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Estado</th>
          <th>Codigo Empleado</th>
          <th>Acciones</th>
        </tr>
      </thead>
        <!--Iterando el arreglo de tareas  -->
        <?php 
        foreach( $data_tasks as $task ) {
        ?>
        <tr>
          <td><?php echo $task["id_task"];?></td>
          <td><?php echo $task["title"];?></td>
          <td><?php echo $task["status"];?></td>
          <td><?php echo $task["id_employee"];?></td>
          <td>
            <button class="btn btn-warning"> Editar</button>
          </td>
        </tr>

        <?php }?>

      <tbody>
      </tbody>
    </table>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
          crossorigin="anonymous"></script>
</body>
</html>
