<?php

namespace App\Tests\Unit\Entity;

use App\Entity\TodoItem;
use App\Entity\TodoList;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Ulid;

class TodoListTest extends TestCase
{
    public function testGetSetId(): void
    {
        $todoList = new TodoList();
        $id = new Ulid();

        self::assertEquals($todoList, $todoList->setId($id));
        self::assertEquals($id, $todoList->getId());
    }

    public function testGetSetTodoList(): void
    {
        $todoList = new TodoList();
        /** @var ArrayCollection<int, TodoItem> */
        $todoItems = new ArrayCollection();
        $todoItems->add(new TodoItem());

        self::assertEquals($todoList, $todoList->setItems($todoItems));
        self::assertEquals($todoItems, $todoList->getItems());
    }

    public function testGetSetDescription(): void
    {
        $todoList = new TodoList();
        $title = (Factory::create())->name();

        self::assertEquals($todoList, $todoList->setTitle($title));
        self::assertEquals($title, $todoList->getTitle());
    }

    public function testGetSetCreatedAt(): void
    {
        $todoList = new TodoList();
        $createdAt = new \DateTimeImmutable();

        self::assertEquals($todoList, $todoList->setCreatedAt($createdAt));
        self::assertEquals($createdAt, $todoList->getCreatedAt());
    }
}
