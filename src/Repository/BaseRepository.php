<?php

namespace Matheus\Taskify\Repository;

class BaseRepository
{
    public function __construct(
        protected \PDO $pdo
    ) {
    }
}
