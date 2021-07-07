<?php

ob_start();

session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$app = new Router(site());
$app->namespace("Source\Controllers");

/**
 * WEB
 */

$app->group(null);
$app->get("/", "Web:home", "web.home");

/**
 * CONTROLLER COVID
 */

$app->get("/api/covid/casos/mensais", "CovidController:casosMensais", "covid19.casosMensais");

/**
 * ERRORS
 */
$app->group("ops");
$app->get("/{errcode}", "Web:error", "web.error");

/**
 * ROUTE PROCESS
 */

$app->dispatch();
/**
 * ERRORS PROCESS
 */

if ($app->error()) {
    $app->redirect("web.error", ['errcode' => $app->error()]);
}

ob_end_flush();
