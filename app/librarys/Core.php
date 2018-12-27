<?php

    /**
     * Mapear la url ingresada en el navegador
     * 1-Controlador
     * 2-Metodo
     * 3-Parametro
     * Ejemplo: /articulo/actualizar/2
     */

     Class Core {
         
        protected $controllerCurrent = 'Pagina';
        protected $methodCurrent = 'index';
        protected $params = [];

        public function __construct()
        {
            //print_r($this->getUrl());
            $url = $this->getUrl();

            //Buscar en controladores si el controlador existe
            if(file_exists('../app/controllers/'.ucwords($url[0]).'Controller.php'))
            {
                // si existe se setea como controlador por defecto
                $this->controllerCurrent = ucwords($url[0]);

                //unset indice
                unset($url[0]);
           }

            //requerir el controlador
            require_once '../app/controllers/'. $this->controllerCurrent . 'Controller.php';

            $this->controllerCurrent = new $this->controllerCurrent;

            //Segunda parte de la url que seria el metodo
            if(isset($url[1]))
            {
                if(method_exists($this->controllerCurrent, $url[1]))
                {
                    // chequeamos el metodo
                    $this->methodCurrent = $url[1];

                    //unset indice
                    unset($url[1]);
                }

               // echo $this->methodCurrent;
            }
            
            //Obtener los posibles parametros
            $this->params = $url ? array_values($url) : [];
         
            //Llamar callback con parametros array
            call_user_func_array([$this->controllerCurrent, $this->methodCurrent], $this->params);
        }

        public function getUrl()
        {
            if(isset($_GET['url']))
            {
                //rtrim =  para cortarlos espacio que tenga hacia la derecha de la url
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;

            }

            //echo $_GET['url'];
        }
     }

