<?php

namespace App\Entity\base;

use DATE;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ORM\HasLifecycleCallbacks;
use DateTime;

/**
 * @ORM\HasLifecycleCallbacks
 */
trait TimeTrait
{
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Gedmo\Timestampable(on: 'create')]
     /**
     * opt:{"label":"Créé le"}
     * TPL:no_form
     */
    private ?DateTime $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Gedmo\Timestampable(on: 'update')]
     /**
     * opt:{"label":"Mis à jour le"}
     * opt:{"widget":"single_text"}
     * attr:{"data-controller":"base--resetinput"}
     */
    private ?DateTime $updatedAt = null;
    public function setUpdatedAt(?DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    /**
     * TPL:no_form
     * opt:{"label":"Supprimé le"}
     */
    private ?DateTime $deletedAt = null;

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
        $this->createdAt = $createdAt;
        return $this;
    }
    public function setDeletedAt(?DateTime $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }
}
