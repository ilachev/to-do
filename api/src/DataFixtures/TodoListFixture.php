<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\TodoList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TodoListFixture extends Fixture
{
    public const REFERENCE_TODO_LIST_FIRST = 'todo_list_first_ref';
    public const REFERENCE_TODO_LIST_SECOND = 'todo_list_second_ref';

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $todoListFirst = (new TodoList())
            ->setCreatedAt(new \DateTimeImmutable())
            ->setTitle($faker->name('male'))
        ;
        $todoListSecond = (new TodoList())
            ->setCreatedAt(new \DateTimeImmutable())
            ->setTitle($faker->name('female'))
        ;

        $manager->persist($todoListFirst);
        $manager->persist($todoListSecond);
        $this->setReference(self::REFERENCE_TODO_LIST_FIRST, $todoListFirst);
        $this->setReference(self::REFERENCE_TODO_LIST_SECOND, $todoListSecond);
        $manager->flush();
    }
}