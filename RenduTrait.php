<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Service\base\ArticleHelper;

trait RenduTrait
{

    #[ORM\Column(type: Types::TEXT, nullable: true)] //hack pour forcer symfony à faire un set en mettant forçant sur une chaine vide
    /**
     * hidden
     * attr:{"value":"fixed-bottom"} 
     * tpl:no_index
     */
    private ?string $rendu;
    public function getRendu(): ?string
    {
        return $this->rendu;
    }
    public function setRendu(?string $rendu): static
    {
        $this->rendu = ArticleHelper::getrendu($this);
        return $this;
    }
}
