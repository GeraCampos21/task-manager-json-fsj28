<?php 

class EmployeeModel{
    private static $file_path = "../data/employee.json";

    //Obtener Empleados de la data employee 
    public static function all(){
        //SELECT FROM employee.json
        if(file_exists(self::$file_path)){          
            $data_json = file_get_contents(self::$file_path);
            return json_decode($data_json, true); //arreglo de las tareas
        }

        return [];
    }
}























