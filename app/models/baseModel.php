<?php
namespace App\Models;

use PDO;
use PDOException;

abstract class BaseModel{
    protected $dbConnection;
    protected $table;

    public function __construct(){
        //Se genera la conexion a la base de datos
        $dbConfig = require_once MAIN_APP_ROUTE."../config/database.php";
        try {
            
            // $dns = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']}";
            // $this->dbConnection = new PDO($dns, $dbConfig['username'], $dbConfig['password']);
            $dns = DRIVER.":host=".HOST.";dbname=".DATABASE;
            $this->dbConnection = new PDO($dns, USERNAME, PASSWORD);
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getAll():array{
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->dbConnection->query($sql);
            //Obtenemos los datos en un array asociativo
            $resul = $statement->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}