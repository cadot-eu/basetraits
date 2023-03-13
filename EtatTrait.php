<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait EtatTrait
{
    #[ORM\Column(type: Types::STRING, length: 255, options: ['default' => 0])]
    /**
     * choiceenplace
     * options:{"brouillon":"<i class=\"bi bi-journal-text\"></i>","en ligne":"<i class=\"bi bi-journal-check\"></i>","à vérifier":"<i class=\"bi bi-journal\"></i>","archive":"<i class=\"bi bi-journal-x\"></i>"}
     */
    private $etat = "brouillon";
    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
