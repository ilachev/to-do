<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Repository\TodoListRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoListController extends AbstractController
{
    public function __construct(
        private TodoListRepositoryInterface $todoListRepository
    ) {}

    #[Route(path: '/todo-lists', name: 'todo.lists', methods: ['GET'])]
    public function all(): Response
    {
        return $this->json($this->todoListRepository->getAll());
    }
}
