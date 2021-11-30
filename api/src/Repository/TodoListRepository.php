<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TodoItem;
use App\Entity\TodoList;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;

class TodoListRepository implements TodoListRepositoryInterface
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function getAll(): array
    {
        $qb = $this->em->createQueryBuilder()
            ->select('tl, td')
            ->from(TodoList::class, 'tl')
            ->innerJoin('tl.items', 'td')
        ;

        return $qb->getQuery()->getArrayResult();
    }
}
