<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\TodoItem;
use App\Entity\TodoList;
use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Ulid;

class TodoItemTest extends TestCase
{
    public function testGetSetId(): void
    {
        $todoItem = new TodoItem();
        $id = new Ulid();

        self::assertEquals($todoItem, $todoItem->setId($id));
        self::assertEquals($id, $todoItem->getId());
    }

    public function testGetSetTodoList(): void
    {
        $todoItem = new TodoItem();
        $todoList = new TodoList();

        self::assertEquals($todoItem, $todoItem->setList($todoList));
        self::assertEquals($todoList, $todoItem->getList());
    }

    public function testGetSetDescription(): void
    {
        $todoItem = new TodoItem();
        $description = (Factory::create())->text(50);

        self::assertEquals($todoItem, $todoItem->setDescription($description));
        self::assertEquals($description, $todoItem->getDescription());
    }

    public function testGetSetCreatedAt(): void
    {
        $todoItem = new TodoItem();
        $createdAt = new \DateTimeImmutable();

        self::assertEquals($todoItem, $todoItem->setCreatedAt($createdAt));
        self::assertEquals($createdAt, $todoItem->getCreatedAt());
    }
}