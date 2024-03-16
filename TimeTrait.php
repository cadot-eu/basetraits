<?php

namespace App\Entity\base;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ORM\HasLifecycleCallbacks;
use DateTime;

#[ORM\HasLifecycleCallbacks]
trait TimeTrait
{
    #[ORM\PrePersist]
    public function initializeTimestamps(): void
    {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }


    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    /**
     * opt:{"label":"Créé le"}
     * TPL:no_form
     */
    private ?DateTime $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    /**
     * opt:{"label":"Mis à jour le"}
     * opt:{"widget":"single_text"}
     * attr:{"data-controller":"base--resetinput"}
     */
    private ?DateTime $updatedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    /**
     * TPL:no_form
     * opt:{"label":"Supprimé le"}
     */
    private ?DateTime $deletedAt = null;

    public function setUpdatedAt(?DateTime $updatedAt): self
    {
        if ($updatedAt === null) {
            $updatedAt = new DateTime();
        }
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setCreatedAt(?DateTime $createdAt): self
    {
        if ($createdAt === null) {
            $createdAt = new DateTime();
        }
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setDeletedAt(?DateTime $deletedAt): self
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }
}
