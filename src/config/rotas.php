<?php

use Matheus\Taskify\Controller\FazSairController;
use Matheus\Taskify\Controller\FazCadastrarController;
use Matheus\Taskify\Controller\FazEditaTaskController;
use Matheus\Taskify\Controller\FazEntrarController;
use Matheus\Taskify\Controller\FazExcluiTaskController;
use Matheus\Taskify\Controller\FazFechaTaskController;
use Matheus\Taskify\Controller\FazNovaTaskController;
use Matheus\Taskify\Controller\FazReabreTaskController;

use Matheus\Taskify\Controller\MostraCadastrarController;
use Matheus\Taskify\Controller\MostraDashboardController;
use Matheus\Taskify\Controller\MostraEditaTaskController;
use Matheus\Taskify\Controller\MostraEntrarController;
use Matheus\Taskify\Controller\MostraHomeController;
use Matheus\Taskify\Controller\MostraNovaTaskController;

return [
    '/' => MostraHomeController::class,
    '/entrar' => MostraEntrarController::class,
    '/cadastrar' => MostraCadastrarController::class,
    '/dashboard' => MostraDashboardController::class,

    '/nova-task' => MostraNovaTaskController::class,
    '/edita-task' => MostraEditaTaskController::class,

    '/acoes/entrar' => FazEntrarController::class,
    '/acoes/cadastrar' => FazCadastrarController::class,
    '/acoes/sair' => FazSairController::class,

    '/acoes/nova-task' => FazNovaTaskController::class,
    '/acoes/exclui-task' => FazExcluiTaskController::class,
    '/acoes/fecha-task' => FazFechaTaskController::class,
    '/acoes/reabre-task' => FazReabreTaskController::class,
    '/acoes/edita-task' => FazEditaTaskController::class,
];