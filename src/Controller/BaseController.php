<?php

namespace Matheus\Taskify\Controller;

use Matheus\Taskify\Enum\TiposMensagem;

class BaseController
{
    public function __construct(
        protected \PDO $pdo
    ) {
    }

    protected function renderizaHTML(string $view, array $variaveis = []): string
    {
        ob_clean();

        try {
            extract($variaveis);

            include __DIR__ . "/../View/layout/inicio-padrao.php";
            require_once __DIR__ . "/../View/{$view}.php";
            include __DIR__ . "/../View/layout/final-padrao.php";
        } catch (\Throwable $erro) {
            throw new \InvalidArgumentException("A view '$view' não existe ou não foi encontrada!");
        }

        return ob_get_clean();
    }

    protected function redireciona(string $rota): void
    {
        header("location:{$rota}");
    }

    protected function mensagem(string $texto, TiposMensagem $tipo = TiposMensagem::ERRO): void
    {
        $_SESSION['mensagem'] = [
            'tipo' => $tipo->value,
            'texto' => $texto
        ];
    }
}
