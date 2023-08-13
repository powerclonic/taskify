<?php

namespace Matheus\Taskify\Controller;

class MostraHomeController extends BaseController
{
    public function controla(): string
    {
        return $this->renderizaHTML('home');
    }
}