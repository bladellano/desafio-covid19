<?php

namespace Source\Core;

/**
 * Class CovidService
 * @package Source\Core
 */
class CovidService
{
    /**
     * @var RestService
     */
    protected $covid19;

    /**
     * CovidService constructor.
     */
    public function __construct()
    {
        $params = [
            "brazil",
            "status",
            "confirmed"
        ];

        $this->covid19 = (new RestService("/country", $params))->get();
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function totalPorPeriodo()
    {
        $dados = $this->covid19->callback();

        $novasDatas = [];
        $temp = [];

        foreach ($dados as $porDia) :

            $d = (new \DateTime($porDia->Date))->format('Y-m-d');

            $mesAno = explode('-',  $d);
            $mesAno = $mesAno[0] . '-' . $mesAno[1];

            if (!in_array($mesAno, $temp)) {
                $temp[] = $mesAno;
            }

            $porExtenso = mb_strtoupper(strftime('%B', strtotime($mesAno))) . "/" . strstr($mesAno, "-", true);

            $novasDatas[$porExtenso][] = $porDia->Cases;

        endforeach;

        foreach ($novasDatas as $mesAno => &$qtd)
            $qtd = array_sum($qtd);

        return $novasDatas;
    }

    /**
     * @return false|string
     * @throws \Exception
     */
    public function totalPorPeriodoJson()
    {
        $dados = $this->covid19->callback();

        $novasDatas = [];
        $temp = [];

        foreach ($dados as $porDia) :

            $d = (new \DateTime($porDia->Date))->format('Y-m-d');

            $mesAno = explode('-',  $d);
            $mesAno = $mesAno[0] . '-' . $mesAno[1];

            if (!in_array($mesAno, $temp)) {
                $temp[] = $mesAno;
            }

            $novasDatas[$mesAno][] = $porDia->Cases;

        endforeach;

        foreach ($novasDatas as $mesAno => &$qtd)
            $qtd = ["mes" => $mesAno, "total" => array_sum($qtd)];

        return \json_encode(array_values($novasDatas));
    }
}
