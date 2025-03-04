<?php

namespace App\Models;

require_once MAIN_APP_ROUTE."../models/baseModel.php";


class CentroModel extends BaseModel{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,

    )
    {
        //Se llama al constructor del padre
        parent::__construct();
        //Especifica la tabla
        $this->table = "centroformacion";
    }
}