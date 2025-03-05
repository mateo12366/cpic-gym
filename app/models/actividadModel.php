<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/baseModel.php";


class ActividadModel extends BaseModel{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $descripcion = null,

    )
    {
        //Se llama al constructor del padre
        parent::__construct();
        //Especifica la tabla
        $this->table = "actividad";
    }

    public function save()
    {
        try {
            // 1. se prepara la consulta
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre, descripcion) VALUES (:nombre, :descripcion)");
            // 2. se remplazan las variables
            $sql->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(":descripcion", $this->descripcion, PDO::PARAM_STR);
            // 3. se ejecuta la consulta
            $res = $sql->execute();
            return $res;

        } catch (PDOException $ex) {
            echo "Erroren la consulta" . $ex->getMessage();
        }
    }

    public function getOneActividad()
    {
        try {
            $sql = "SELECT * FROM $this->table  WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;

        } catch (PDOException $ex) {
            echo "Error al obtener rol>" . $ex->getMessage();
        }
    }

    public function editActividad()
    {
        try {
            $sql = "UPDATE $this->table SET nombre = :nombre, descripcion= :descripcion WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $this->descripcion, PDO::PARAM_STR);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "La Actividad no pudo ser editada" . $ex->getMessage();
        }

    }

    public function deleteActividad()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $res = $statement->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error al eliminar la actividad" . $ex->getMessage();
        }
    }
}