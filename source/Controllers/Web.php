<?php

namespace Source\Controllers;

use Source\Core\CovidService;

/**
 * Class Web
 * @package Source\Controllers
 */
class Web extends Controller
{

    /**
     *
     */
    public function home():void
    {
        $resultado = (new CovidService())->totalPorPeriodo();

        die($this->view->render("theme/home", [
            "title" => "Total de casos de COVID no Brasil, agrupados por mês",
            "resultado" => $resultado,
        ]));
    }

    /**
     * @param $data
     */
    public function error($data): void
    {
        $error = filter_var($data["errcode"], FILTER_VALIDATE_INT);

        echo $this->view->render("theme/error", [
            "title" => "Erro {$error}",
            "error" => $error
        ]);
    }
}
