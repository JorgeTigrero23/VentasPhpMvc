<?php
/**
 * Clase Controlador principal
 * Se encatha de poder cargar los modelos y las vistas
 */
class Controller
{
    //Cargar el modelo
    public function model($model)
    {
        //carga
        require_once '../app/models/'.$model.'.php';
        
        //instamciamos el modelo
        return new $model();
    }
    
    //Cargar la vista
    public function view($view, $data = [])
    {
        //chequeamos que el archivo visya existe
        if(file_exists('../app/views/'.$view.'.php'))
        {
            require_once '../app/views/'.$view.'.php';
        }
        else {
            // Si el archivo de la vista no existe
            die('la vista no existe');
        }
    }
    
}
