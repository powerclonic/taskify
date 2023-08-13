<?php

namespace Matheus\Taskify\Enum;

enum TiposMensagem: string
{
    case ERRO = "danger";
    case SUCESSO = "success";
}