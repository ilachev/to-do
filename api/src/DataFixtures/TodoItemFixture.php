<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\TodoItem;
use App\Entity\TodoList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TodoItemFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        /** @var TodoList $todoListFirst */
        $todoListFirst = $this->getReference(TodoListFixture::REFERENCE_TODO_LIST_FIRST);
        /** @var TodoList $todoListSecond */
        $todoListSecond = $this->getReference(TodoListFixture::REFERENCE_TODO_LIST_SECOND);

        for ($i = 0; $i <= 15; $i++) {
            $todoItem = (new TodoItem())
                ->setCreatedAt(new \DateTimeImmutable())
                ->setList($todoListFirst)
                ->setDescription($faker->text(50))
            ;
            $manager->persist($todoItem);
        }

        for ($i = 0; $i <= 10; $i++) {
            $todoItem = (new TodoItem())
                ->setCreatedAt(new \DateTimeImmutable())
                ->setList($todoListSecond)
                ->setDescription($faker->text(50))
            ;
            $manager->persist($todoItem);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TodoListFixture::class,
        ];
    }
}
