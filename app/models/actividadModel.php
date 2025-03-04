<?php

namespace App\Models;

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
}