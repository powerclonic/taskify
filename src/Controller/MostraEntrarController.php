<?php

namespace Matheus\Taskify\Controller;

class MostraEntrarController extends BaseController
{
    public function controla(): string
    {
        return $this->renderizaHTML('entrar');
    }
}