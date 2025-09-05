<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro de Tareas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>
<body>
     <?php
      require_once "../controller/ManagerController.php";
      $data_employees = ManagerController::getEmployees();
      //print_r($data_employees);   
       
    //El name representa lo que php va extraer de cada entrada de datos de elemento de un formulario
  ?>
    <main class="container">
        <h1 class="my-5">Crear Tarea</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="">Id Tarea</label>
                <input type="number" class="form-control" name="id_task">
            </div>
            <div class="mb-3">
                <label for="">Titulo</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="mb-3">
                <label for="">Descripcion</label>
                <input type="text" class="form-control" name="description">
            </div>

            <div class="mb-3">
                <label for="">Asignar Empleado</label>
                <select id="" class="form-control" name="id_employee">
                <?php foreach( $data_employees as $data_employee ) {?>
                    <option value="<?php echo $data_employee["id_employee"]?>">
                        <?php echo $data_employee["name"];?>
                    </option>
                <?php }?>

                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Crear Tarea">
        </form>

    </main>
    <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
          crossorigin="anonymous"></script>

    <?php 
    echo "hola mundo";
     //isset() => verificar si hay datos o no hayt datos
     if(isset($_POST['id_task'], $_POST['title'], $_POST['description'], $_POST['id_employee'])){
        echo "se ingreso a aqui";
        echo $id = $_POST['id_task'];
        echo $title = $_POST['title'];
        echo $descripcion = $_POST['description'];
        echo $employee = $_POST['id_employee']; 
        
         $task = new TaskModel($id, $title, $description, $employee);
         ManagerController::createTask($task);

     }
    ?>
</body>

</html>