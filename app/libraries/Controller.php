<?php 
/**This is the base controller 
 * this loads the models and views */

class Controller{
    //load models
    public function model($model){
            //require model files
            require_once '../app/models/'. $model. '.php';

            //instantiate model

            return new $model();
    }

    public function view($view, $data = []){
                // check for the view
                if(file_exists('../app/views/'. $view .'.php')){
                    require_once '../app/views/'. $view. '.php';
                }else{
                    //view not exists
                    die("view not exists");
                }
    }

}