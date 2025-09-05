<?php

# modelo que se va encargar de consultar los datos del json de tareas

// guardar tarea, listar todas las tareas, editar tarea (JSON)

class TaskModel{
    public $id_task;
    public $title;
    public $description;
    public $date;
    public $status;
    public $id_employee;

    //atributo para manejar la url del json
    private static $file_path = '../data/tasks.json';

    public function __construct($id_task, $title, $description, $id_empleyoee)
    {
        $this->id_task = $id_task;
        $this->title = $title;
        $this->description = $description;
        $this->date = date('Y-m-d');
        $this->status = 'Pendiente';
        $this->id_employee = $id_empleyoee;
    }
  
    //metodo para obtener todas las tareas del json
    public static function all(){
        //SELECT * FROM table
        if(file_exists(self::$file_path)){
            //obteniendo el archivo json
            $data_json = file_get_contents(self::$file_path);

            //json_decode() = convertir tu JSON a un arreglo de PHP - json_encode() = convertir un arreglo de PHP a json
            //decodificando el json a un arreglo de PHP
            return json_decode($data_json, true); //arreglo de las tareas
        }

        return [];
    }

    //metodo que va cargar el json y lo va actualizar
    private static function loadJSON($array_tasks){
        //metodo que nos ayude actualizar el JSON
        //codificar el arreglo de PHP a un formato de tipo JSON
        $data_json = json_encode($array_tasks, JSON_PRETTY_PRINT);
        file_put_contents(self::$file_path, $data_json);
    }

    //metodo para guardar una tarea
    public function save(){

        $list_tasks = self::all(); //devuelve el arreglo de las tareas que hay en el json

        //agregando un nuevo elemento (tarea)
        //array_push($list_tasks, []);

        $list_tasks[] = [
            "id_task" => $this->id_task,
            "title" => $this->title,
            "description" => $this->description,
            "date" => $this->date,
            "status" => $this->status,
            "id_employee" => $this->id_employee
        ];

        //Aqui si lleva el objeto con todos sus valores 
        //print_r($list_tasks); 

        self::loadJSON($list_tasks);
        return "Se ha guardado correctamente";
    }

}