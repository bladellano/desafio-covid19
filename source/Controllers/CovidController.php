<?php

namespace Source\Controllers;

use Source\Core\CovidService;

/**
 * Class CovidController
 * @package Source\Controllers
 */
class CovidController
{

    /**
     *
     */
    public function casosMensais():void
    {
        header('Content-Type: application/json');
        $resultado = (new CovidService())->totalPorPeriodoJson();
        die($resultado);
    }
}
