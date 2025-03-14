<?php

namespace App\Models;

use DateTime;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";


class GrupoModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $ficha = null,
        private ?int $cantApren = null,
        private ?string $estado = null,
        private ?DateTime $fechaInicioLect = null,
        private ?DateTime $fechaFinLect = null,
        private ?int $fkidProgramaForm = null,

    ) {
        //Se llama al constructor del padre
        parent::__construct();
        //Especifica la tabla
        $this->table = "grupo";
    }

    public function getAllGrupo()
    {
        $sql = "SELECT grupo.id, grupo.ficha, grupo.cantApren, grupo.estado, grupo.fechaInicioLect, grupo.fechaFinLect, programaformacion.nombre AS programa FROM grupo 
        INNER JOIN programaformacion ON grupo.fkidProgramaForm = programaformacion.id";
        $statement = $this->dbConnection->query($sql);
        $res = $statement->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function save()
    {
        try {
            $fechaInicioLect = $this->fechaInicioLect->format('Y-m-d ');
            $fechaFinLect = $this->fechaFinLect->format('Y-m-d');
            // 1. se prepara la consulta
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (ficha, cantApren, estado, fechaInicioLect, fechaFinLect, fkidProgramaForm) VALUES (:ficha, :cantApren, :estado, :fechaInicioLect, :fechaFinLect, :programa)");
            // 2. se remplazan las variables
            $sql->bindParam(":ficha", $this->ficha, PDO::PARAM_STR);
            $sql->bindParam(":cantApren", $this->cantApren, PDO::PARAM_INT);
            $sql->bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $sql->bindParam(":fechaInicioLect", $fechaInicioLect, PDO::PARAM_STR);
            $sql->bindParam(":fechaFinLect", $fechaFinLect, PDO::PARAM_STR);
            $sql->bindParam(":programa", $this->fkidProgramaForm, PDO::PARAM_INT);
            // 3. se ejecuta la consulta
            $res = $sql->execute();
            return $res;

        } catch (PDOException $ex) {
            echo "Erroren la consulta" . $ex->getMessage();
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

    public function editGrupo()
    {
        try {
            $fechaInicioLecstr = $this->fechaInicioLect->format('Y-m-d');
            $fechaFinLecstr = $this->fechaFinLect->format('Y-m-d');

            $sql = "UPDATE $this->table SET ficha = :ficha, cantApren = :cantApren, estado = :estado, fechaInicioLect=:fechaInicioLect, fechaFinLect=:fechaFinLect,fkidProgramaForm=:programa  WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":ficha", $this->ficha, PDO::PARAM_STR);
            $statement->bindParam(":cantApren", $this->cantApren, PDO::PARAM_STR);
            $statement->bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $statement->bindParam(":fechaInicioLect", $fechaInicioLecstr, PDO::PARAM_STR);
            $statement->bindParam(":fechaFinLect", $fechaFinLecstr, PDO::PARAM_STR);
            $statement->bindParam(":programa", $this->fkidProgramaForm, PDO::PARAM_INT);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El no pudo ser editado" . $ex->getMessage();
        }

    }

    public function deleteGrupo()
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

    public function getOneGrupo()
{
    try {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $statement = $this->dbConnection->prepare($sql);
        $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_OBJ);
        return $res;
    } catch (PDOException $ex) {
        echo "Error al obtener el grupo: " . $ex->getMessage();
    }
}

}