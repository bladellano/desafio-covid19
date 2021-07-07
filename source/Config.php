<?php

/**
 * SITE CONFIG
 */

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

define("SITE", [
    "name" => "Desafio covid19",
    "desc" => "Desenvolvendo aplicação para o desafio",
    "domain" => "desafiocovid19.com",
    "locale" => "pt_BR",
    "root" => "http://127.0.0.1/covid19"
]);

define("URL_API", "https://api.covid19api.com");

define("DS", DIRECTORY_SEPARATOR);

/**
 * SITE MINIFY
 */
if ($_SERVER['SERVER_NAME'] == "127.0.0.1") {
    require __DIR__ . "/Minify.php";
}
