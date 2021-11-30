<?php

declare(strict_types=1);

namespace App\Repository;

interface TodoListRepositoryInterface
{
    public function getAll(): array;
}