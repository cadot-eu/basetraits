<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait ImportanceTrait
{
    #[ORM\Column(type: 'integer', nullable: true)]
    /**
     * importance
     * tpl:no_form
     */
    private $importance = 0;
    public function getImportance(): ?int
    {
        return $this->importance;
    }

    public function setImportance(?int $importance): self
    {
        $this->importance = $importance;

        return $this;
    }
}
