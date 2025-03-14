<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";


class TipoUsuarioModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,

    ) {
        //Se llama al constructor del padre
        parent::__construct();
        //Especifica la tabla
        $this->table = "tipousuariogym";
    }

    public function save()
    {
        try {
            // 1. se prepara la consulta
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre) VALUES (?)");
            // 2. se remplazan las variables
            $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
            // 3. se ejecuta la consulta
            $res = $sql->execute();
            return $res;

        } catch (PDOException $ex) {
            echo "Erroren la consulta" . $ex->getMessage();
        }
    }

    public function getOneUsuario()
    {
        try {
            $sql = "SELECT * FROM $this->table  WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;

        } catch (PDOException $ex) {
            echo "Error al obtener tipo de usuario>" . $ex->getMessage();
        }
    }

    public function editTipoUsuario()
    {
        try {
            $sql = "UPDATE $this->table SET nombre = :nombre WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El no pudo ser editado" . $ex->getMessage();
        }

    }

    public function deleteTipoUsuario()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $res = $statement->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error al eliminar el tipo de usuario" . $ex->getMessage();
        }
    }
}