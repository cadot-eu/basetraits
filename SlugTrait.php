<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait SlugTrait
{
    #[ORM\Column(length: 50, nullable: true)] //nullable=true pour supporter ancienne base de donnée, pas d'unique pour la même raison
    private ?string $slug = null;
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
