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
        // on détermine le slug
        $array = ['Nom','Titre'];
        foreach ($array as $value) {
            $function = 'get' . $value;
            if (\function_exists($function) && $this->$function() && null === $this->slug) {
                $this->slug = (new AsciiSlugger())->slug($this->$function())->lower();
                break;
            }
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
