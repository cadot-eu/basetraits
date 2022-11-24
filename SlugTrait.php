<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait SlugTrait
{
    #[ORM\Column(type: Types::STRING, length: 255)]
    #[Gedmo\Slug(fields: ["pourSlug"], unique: true, updatable: true)]
    /** 
     * slug
     * OPT:{"disabled":true}
     * OPT:{"required":false} 
     * OPT:{"label":"url"} 
     */
    private $slug;
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    /**
     * tpl:no_form
     * tpl:no_index
     * tpl:no_show
     */
    private $pourSlug;
}
