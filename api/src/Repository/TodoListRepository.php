<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TodoList;
use Doctrine\ORM\EntityManagerInterface;

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
