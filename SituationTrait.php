<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait SituationTrait
{
    #[ORM\Column(type: Types::STRING)]
    /**
     * choiceenplace
     * xtra:{"champ":"situation"}
     * options:{"inactif":"<i class=\"bi bi-toggle-off\"></i>","actif":"<i class=\"bi bi-toggle-on\"></i>"}
     * OPT:{"expanded":true}
     */
    private $situation;
    public function getSituation(): ?string
    {
        if ($this->situation == null)
            return 'inactif';
        return $this->situation;
    }

    public function setSituation(string $situation): self
    {
        $this->situation = $situation;
        return $this;
    }
}
