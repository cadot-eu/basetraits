<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\AsciiSlugger;

trait SlugTrait
{
    #[ORM\Column(length: 100, nullable: true)] //nullable=true pour supporter ancienne base de donnée, pas d'unique pour la même raison
    private ?string $slug = null;

    public function getSlug(): ?string
    {
        if (null === $this->slug && $this->getNom() !== null) {
            return (new AsciiSlugger())->slug($this->getNom())->lower();
        }
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        if (null === $slug) {
            $slug = (new AsciiSlugger())->slug($this->getNom())->lower();
        }
        $this->slug = $slug;

        return $this;
    }
}
