<?php

namespace Matheus\Taskify\Controller;

class FazSairController extends BaseController
{
    public function controla()
    {
        session_destroy();

        $this->redireciona('/entrar');
    }
}
