<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait DevantTrait
{

    #[ORM\Column(nullable: true)]
    /**
     * onechoiceenplace
     * xtra:{"champ":"mis devant"}
     * options:{"0":"<i class=\"bi bi-toggle-off\"></i>","1":"<i class=\"bi bi-toggle-on\"></i>"}
     * TPL:no_form
     */
    private ?bool $devant = null;

    public function isDevant(): ?bool
    {
        return $this->devant;
    }

    public function setDevant(?bool $devant): self
    {
        $this->devant = $devant;

        return $this;
    }
}
