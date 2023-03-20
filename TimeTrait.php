<?php

namespace App\Entity\base;

use DATE;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ORM\HasLifecycleCallbacks;
use DateTime;

trait TimeTrait
{
    /**
     * opt:{"label":"Créé le"}
     * TPL:no_form
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private $createdAt;
    /**
     * opt:{"label":"Mis à jour le"}
     * opt:{"widget":"single_text"}
     * attr:{"data-controller":"base--resetinput"}
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private $updatedAt;
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }
    public function setCreatedAt(?DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this->updatedTimestamps();
    }
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }
    public function setUpdatedAt(?DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this->updatedTimestamps();
    }
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    /**
     * TPL:no_form
     * opt:{"label":"Supprimé le"}
     */
    private $deletedAt;

    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?DateTime $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }
    public function updatedTimestamps()
    {

        $DATENow = new DateTime('now');
        if ($this->getUpdatedAt() === null) {
            $this->setUpdatedAt($DATENow);
        }

        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($DATENow);
        }
        return $this;
    }
}
