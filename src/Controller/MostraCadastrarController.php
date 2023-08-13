<?php

namespace Matheus\Taskify\Controller;

class MostraCadastrarController extends BaseController
{
    public function controla(): string
    {
        return $this->renderizaHTML('cadastrar');
    }
}