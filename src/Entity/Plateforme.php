<?php

namespace App\Entity;

use App\Repository\PlateformeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlateformeRepository::class)]
class Plateforme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libPlateforme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibPlateforme(): ?string
    {
        return $this->libPlateforme;
    }

    public function setLibPlateforme(string $libPlateforme): static
    {
        $this->libPlateforme = $libPlateforme;

        return $this;
    }

    public function __toString(): string
    {
        return $this->libPlateforme ?? '';
    }
}
