<?php

    //Cargamos las librerias
    require_once 'config/Config.php';

    require_once 'helpers/url_helper.php';
    
    // require_once 'librarys/Base.php';
    // require_once 'librarys/Controller.php';
    // require_once 'librarys/Core.php';

    // Autoload Php
    spl_autoload_register(function($className){
        require_once 'librarys/'.$className.'.php';
    });
