<?php

namespace Matheus\Taskify\Controller;

class MostraNovaTaskController extends BaseController
{
    public function controla(): string
    {
        return $this->renderizaHTML('novaTask');
    }
}