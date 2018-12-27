<?php

// clase para conecctarse a la Base de Datos y ejecutar consultas
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        // Configurar conexion
        $dns = 'mysql:host=' .$this->host . ';dbname=' .$this->dbname;

        $opciones = array(
            PDO::ATTR_PERSISTENT => True,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Crear una instancia de PDO
        try {
        
            $this->dbh = new PDO($dns, $this->user, $this->password, $opciones);
            $this->dbh->exec('set names utf8');

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Preparamos la consulta
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Vinculamos la consita con Bind
    public function bind($param, $value, $type=mull)
    {
        if(is_null($type))
        {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Ejecuta la consulta
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Obtener los registros
    public function all()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtener solo un registro
    public function find()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Obtener cantidad de filas con el metodo rowCount
    public function rowCount()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }


}
