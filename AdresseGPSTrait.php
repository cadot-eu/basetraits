<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait AdresseGPSTrait
{
    #[ORM\Column(length: 255, nullable: true)]
    /**
     * adresse
     * attr:{"data-base--adresse-limit-value":"15"}
     * attr:{"data-base--adresse-proprietes-value":"adresseproprietes"}
     * attr:{"data-base--adresse-latitude-value":"latitude"}
     * attr:{"data-base--adresse-longitude-value":"longitude"}
     * tpl:no_index
     */
    private ?string $adresse = null;
    #[ORM\Column(length: 255, nullable: true)]
    /**
     * hidden
     */
    private ?string $latitude = null;
    #[ORM\Column(length: 255, nullable: true)]
    /**
     * hidden
     */
    private ?string $longitude = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    /**
     * hidden
     */
    private $adresseproprietes = null;
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }
    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }
    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }
    public function getAdresseproprietes(): string
    {
        return $this->adresseproprietes;
    }
    public function setAdresseproprietes(string $adresseproprietes): static
    {
        $this->adresseproprietes = $adresseproprietes;
        return $this;
    }
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }
    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }
}
