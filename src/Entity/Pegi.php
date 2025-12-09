<?php

namespace App\Entity;

use App\Repository\PegiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PegiRepository::class)]
class Pegi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $agePegi = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgePegi(): ?string
    {
        return $this->agePegi;
    }

    public function setAgePegi(string $agePegi): static
    {
        $this->agePegi = $agePegi;

        return $this;
    }

    public function __toString(): string
    {
        return $this->agePegi ?? '';
    }
}
