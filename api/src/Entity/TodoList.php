<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Bridge\Doctrine\IdGenerator\UlidGenerator;
use Symfony\Component\Uid\Ulid;

/** @psalm-suppress PropertyNotSetInConstructor */
#[ORM\Entity]
#[ORM\Table(name: 'app_todo_lists')]
final class TodoList
{
    #[ORM\Id]
    #[ORM\Column(type: 'ulid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UlidGenerator::class)]
    private Ulid $id;

    #[ORM\Column(type: Types::STRING, length: 50)]
    private string $title;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private DateTimeImmutable $createdAt;

    #[ORM\OneToMany(mappedBy: 'list', targetEntity: TodoItem::class)]
    private Collection $items;

    #[Pure]
    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): Ulid
    {
        return $this->id;
    }

    public function setId(Ulid $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): self
    {
        $this->items = $items;

        return $this;
    }
}
