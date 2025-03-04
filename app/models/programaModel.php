<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";


class ProgramaModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $codigo = null,
        private ?string $nombre = null,
        private ?int $centro = null,

    ) {
        //Se llama al constructor del padre
        parent::__construct();
        //Especifica la tabla
        $this->table = "programaformacion";
    }

    public function getAllPrograma()
    {
        $sql = "SELECT programaformacion.id, programaformacion.codigo, programaformacion.nombre, centroformacion.nombre AS centro FROM programaformacion 
        INNER JOIN centroformacion ON programaformacion.fkidCentroFormacion = centroformacion.id";
        $statement = $this->dbConnection->query($sql);
        $res = $statement->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function save()
    {
        try {
            // 1. se prepara la consulta
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (codigo, nombre, fkidCentroFormacion) VALUES (:codigo, :nombre, :centro)");
            // 2. se remplazan las variables
            $sql->bindParam(":codigo", $this->codigo, PDO::PARAM_STR);
            $sql->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(":centro", $this->centro, PDO::PARAM_INT);
            // 3. se ejecuta la consulta
            $res = $sql->execute();
            return $res;

        } catch (PDOException $ex) {
            echo "Erroren la consulta" . $ex->getMessage();
        }
    }

    public function getOneRol()
    {
        try {
            $sql = "SELECT * FROM $this->table  WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;

        } catch (PDOException $ex) {
            echo "Error al obtener programa>" . $ex->getMessage();
        }
    }

    public function editPrograma()
    {
        try {
            $sql = "UPDATE $this->table SET codigo = :codigo, nombre = :nombre, fkidCentroFormacion = :centro WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":codigo", $this->codigo, PDO::PARAM_STR);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":centro", $this->centro, PDO::PARAM_INT);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El no pudo ser editado" . $ex->getMessage();
        }

    }

    public function deletePrograma()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $res = $statement->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error al eliminar el Programa" . $ex->getMessage();
        }
    }

    public function getOnePrograma()
    {
        try {
            $sql = "SELECT * FROM $this->table  WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;

        } catch (PDOException $ex) {
            echo "Error al obtener programa>" . $ex->getMessage();
        }
    }

}