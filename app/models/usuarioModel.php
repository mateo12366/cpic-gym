<?php

namespace App\Models;

use DateTime;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";


class UsuarioModel extends BaseModel
{

    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $tipoDoc = null,
        private ?string $documento = null,
        private ?DateTime $fechaNac = null,
        private ?string $email = null,
        private ?string $genero = null,
        private ?string $estado = null,
        private ?string $telefono = null,
        private ?string $eps = null,
        private ?string $tipoSangre = null,
        private ?float $peso = null,
        private ?float $estatura = null,
        private ?string $telefonoEmer = null,
        private ?string $password = null,
        private ?string $observaciones = null,
        private ?int $fkidRol = null,
        private ?int $fkidGrupo = null,
        private ?int $fkidCentroForm = null,
        private ?int $fkidTipoUserGym = null,
    ) {
        parent::__construct();
        $this->table = "usuario";
    }

    public function validarLogin($email, $password)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE email=:email";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":email", $email);
            $statement->execute();
            $resultSet = [];
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }

            if (count($resultSet) > 0) {
                // Recuperamos de la BD, la contraseña encriptada
                $hashed = $resultSet[0]->password;
                if (password_verify($password, $hashed)) {
                    //los datos de usuario y contraseña son correctos
                    $_SESSION['rol'] = $resultSet[0]->fkidRol;
                    $_SESSION['nombre'] = $resultSet[0]->nombre;
                    $_SESSION['id'] = $resultSet[0]->id;
                    $_SESSION['timeout'] = time();
                    session_regenerate_id();
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $ex) {
            echo "Error validando login" . $ex->getMessage();
        }
    }
    public function getAllUsuario()
    {
        $sql = "SELECT usuario.id, usuario.nombre,usuario.tipoDoc,usuario.documento,usuario.fechaNac,usuario.email,usuario.genero,usuario.estado,usuario.telefono,usuario.eps,usuario.tipoSangre,usuario.peso,usuario.estatura,usuario.telefonoEmer,usuario.password,usuario.observaciones,rol.nombre AS rol, grupo.ficha AS grupo, centroformacion.nombre AS centro ,tipousuariogym.nombre AS tipoUsuario
FROM usuario
INNER JOIN rol ON usuario.fkidRol = rol.id
INNER JOIN grupo ON usuario.fkidGrupo = grupo.id
INNER JOIN centroformacion ON usuario.fkidCentroForm = centroformacion.id
INNER JOIN tipousuariogym ON usuario.fkidTipoUserGym = tipousuariogym.id";

        $statement = $this->dbConnection->query($sql);
        $res = $statement->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function save()
    {
        try {
            // 1. Convierte las fechas de DateTime a string
            $fechaNac = $this->fechaNac->format('Y-m-d');

            // 2. Prepara la consulta SQL
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre, tipoDoc, documento, fechaNac, email, genero, estado, telefono, eps, tipoSangre, peso, estatura, telefonoEmer, password, observaciones, fkidRol, fkidGrupo, fkidCentroForm, fkidTipoUserGym)
        VALUES (:nombre, :tipoDoc, :documento, :fechaNac, :email, :genero, :estado, :telefono, :eps, :tipoSangre, :peso, :estatura, :telefonoEmer, :password, :observaciones, :fkidRol, :fkidGrupo, :fkidCentroForm, :fkidTipoUserGym)");

            // 3. Asocia los parámetros
            $sql->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(":tipoDoc", $this->tipoDoc, PDO::PARAM_STR);
            $sql->bindParam(":documento", $this->documento, PDO::PARAM_STR);
            $sql->bindParam(":fechaNac", $fechaNac, PDO::PARAM_STR);
            $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
            $sql->bindParam(":genero", $this->genero, PDO::PARAM_STR);
            $sql->bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $sql->bindParam(":telefono", $this->telefono, PDO::PARAM_STR);
            $sql->bindParam(":eps", $this->eps, PDO::PARAM_STR);
            $sql->bindParam(":tipoSangre", $this->tipoSangre, PDO::PARAM_STR);
            $sql->bindParam(":peso", $this->peso, PDO::PARAM_STR);
            $sql->bindParam(":estatura", $this->estatura, PDO::PARAM_STR);
            $sql->bindParam(":telefonoEmer", $this->telefonoEmer, PDO::PARAM_STR);
            $passwoeHashed = password_hash($this->password, PASSWORD_DEFAULT);
            $sql->bindParam(":password", $passwoeHashed, PDO::PARAM_STR);
            $sql->bindParam(":observaciones", $this->observaciones, PDO::PARAM_STR);
            $sql->bindParam(":fkidRol", $this->fkidRol, PDO::PARAM_INT);
            $sql->bindParam(":fkidGrupo", $this->fkidGrupo, PDO::PARAM_INT);
            $sql->bindParam(":fkidCentroForm", $this->fkidCentroForm, PDO::PARAM_INT);
            $sql->bindParam(":fkidTipoUserGym", $this->fkidTipoUserGym, PDO::PARAM_INT);


            // 4. Ejecuta la consulta
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error en la consulta: " . $ex->getMessage();
        }
    }

    public function deleteUsuario()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $res = $statement->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error al eliminar el usuario" . $ex->getMessage();
        }
    }

    // public function editFicha()
    // {
    //     try {
    //         $sql = "UPDATE ficha SET id_ficha=:id, fecha_inicio_etapa_lectiva=:fecha_inicio_etapa_lectiva, fecha_fin_etapa_lectiva=:fecha_fin_etapa_lectiva,fecha_inicio_etapa_practica=:fecha_inicio_etapa_practica,fecha_fin_etapa_practica=:fecha_fin_etapa_practica,FK_id_gestor=:gestor , FK_id_programa=:programa WHERE id_ficha = :id";
    //         $statement = $this->dbConnection->prepare($sql);
    //         $statement->bindParam(":id", $this->id_ficha, PDO::PARAM_INT);
    //         $statement->bindParam(":fecha_inicio_etapa_lectiva", $this->fecha_inicio_etapa_lectiva, PDO::PARAM_STR);
    //         $statement->bindParam(":fecha_fin_etapa_lectiva", $this->fecha_fin_etapa_lectiva, PDO::PARAM_STR);
    //         $statement->bindParam(":fecha_inicio_etapa_practica", $this->fecha_inicio_etapa_practica, PDO::PARAM_STR);
    //         $statement->bindParam(":fecha_fin_etapa_practica", $this->fecha_fin_etapa_practica, PDO::PARAM_STR);
    //         $statement->bindParam(":gestor", $this->FK_id_gestor, PDO::PARAM_INT);
    //         $statement->bindParam(":programa", $this->FK_id_programa, PDO::PARAM_INT);
    //         $resp = $statement->execute();
    //         return $resp;
    //     } catch (PDOException $ex) {
    //         echo "La ficha no pudo ser editado" . $ex->getMessage();
    //     }

    // }

    public function editUsuario()
    {
        try {
            // Convierte las fechas de DateTime a string
            $fechaNac = $this->fechaNac->format('Y-m-d');

            // Prepara la consulta SQL
            $sql = "UPDATE $this->table SET 
                    nombre = :nombre, 
                    tipoDoc = :tipoDoc, 
                    documento = :documento, 
                    fechaNac = :fechaNac, 
                    email = :email, 
                    genero = :genero, 
                    estado = :estado, 
                    telefono = :telefono, 
                    eps = :eps, 
                    tipoSangre = :tipoSangre, 
                    peso = :peso, 
                    estatura = :estatura, 
                    telefonoEmer = :telefonoEmer, 
                    password = :password, 
                    observaciones = :observaciones, 
                    fkidRol = :fkidRol, 
                    fkidGrupo = :fkidGrupo, 
                    fkidCentroForm = :fkidCentroForm, 
                    fkidTipoUserGym = :fkidTipoUserGym 
                WHERE id = :id";


            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":tipoDoc", $this->tipoDoc, PDO::PARAM_STR);
            $statement->bindParam(":documento", $this->documento, PDO::PARAM_STR);
            $statement->bindParam(":fechaNac", $fechaNac, PDO::PARAM_STR);
            $statement->bindParam(":email", $this->email, PDO::PARAM_STR);
            $statement->bindParam(":genero", $this->genero, PDO::PARAM_STR);
            $statement->bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $statement->bindParam(":telefono", $this->telefono, PDO::PARAM_STR);
            $statement->bindParam(":eps", $this->eps, PDO::PARAM_STR);
            $statement->bindParam(":tipoSangre", $this->tipoSangre, PDO::PARAM_STR);
            $statement->bindParam(":peso", $this->peso, PDO::PARAM_STR);
            $statement->bindParam(":estatura", $this->estatura, PDO::PARAM_STR);
            $statement->bindParam(":telefonoEmer", $this->telefonoEmer, PDO::PARAM_STR);
            $statement->bindParam(":password", $this->password, PDO::PARAM_STR);
            $statement->bindParam(":observaciones", $this->observaciones, PDO::PARAM_STR);
            $statement->bindParam(":fkidRol", $this->fkidRol, PDO::PARAM_INT);
            $statement->bindParam(":fkidGrupo", $this->fkidGrupo, PDO::PARAM_INT);
            $statement->bindParam(":fkidCentroForm", $this->fkidCentroForm, PDO::PARAM_INT);
            $statement->bindParam(":fkidTipoUserGym", $this->fkidTipoUserGym, PDO::PARAM_INT);


            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "La ficha no pudo ser editada: " . $ex->getMessage();
        }
    }
    public function getOneRol()
    {
        try {
            $sql = "SELECT * FROM $this->table  WHERE id= :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;
        } catch (PDOException $ex) {
            echo "Error al obtener el rol>" . $ex->getMessage();
        }
    }

    public function getOneGrupo()
    {
        try {
            $sql = "SELECT * FROM $this->table  WHERE id= :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;
        } catch (PDOException $ex) {
            echo "Error al obtener el grupo>" . $ex->getMessage();
        }
    }

    public function getOneCentro()
    {
        try {
            $sql = "SELECT * FROM $this->table  WHERE id= :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;
        } catch (PDOException $ex) {
            echo "Error al obtener el centro de formacion>" . $ex->getMessage();
        }
    }

    public function getOneTipoUser()
    {
        try {
            $sql = "SELECT * FROM $this->table  WHERE id= :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;
        } catch (PDOException $ex) {
            echo "Error al obtener el tipo de usuario>" . $ex->getMessage();
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
            echo "Error al obtener el usuario>" . $ex->getMessage();
        }
    }
}
