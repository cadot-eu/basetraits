<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait OrdreTrait
{
    #[ORM\Column(type: 'integer', nullable: true)]
    /**
     * order
     * hidden
     * tpl:no_index
     */
    private $ordre;
    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }
}
