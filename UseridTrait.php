<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait UseridTrait
{
    //_____________________________________________
    #[ORM\Column]
    /**
     * hidden
     * value:app.user.id
     */
    private ?int $userid = null;
    //_____________________________________________
    public function getuserid(): ?int
    {
        return $this->userid;
    }
    public function setuserid(int $userid): static
    {
        $this->userid = $userid;
        return $this;
    }
}
