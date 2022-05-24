<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait VerifiedTrait
{
    #[ORM\Column(type: Types::BOOLEAN)]
    /**
     * choiceenplace
     * options:{"0":"<i class=\"bi bi-toggle-off\"></i>","1":"<i class=\"bi bi-toggle-on\"></i>"}
     * TPL:no_form
     */
    private $isVerified = false;
    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
