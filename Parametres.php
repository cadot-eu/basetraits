<?php

namespace App\Entity\base;

use App\Repository\ParametresRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use App\Entity\base\TimeTrait;
use App\Twig\base\AllExtension;
use Symfony\Component\DomCrawler\Crawler;
use App\Service\base\HtmlHelper;
use App\Service\base\ToolsHelper;
use Symfony\Component\String\Slugger\AsciiSlugger;

#[ORM\Entity(repositoryClass: ParametresRepository::class)]
#[ORM\HasLifecycleCallbacks()]
#[UniqueEntity('nom')]
class Parametres
{
    use TimeTrait;

    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: Types::INTEGER)]
    /**
     * TPL:no_action_add
     * TPL:no_access_deleted
     * TPL:no_created
     * TPL:no_updated
     * TPL:no_index
     * ORDRE:{"nom":"ASC"}
     * SEARCH:['id','nom','valeur']
     */
    private $id;

    #[ORM\Column(type: Types::STRING, length: 255, unique: true)]
    /**
     * attr:{"data-controller" : "base--ckeditor"}
     * attr:{"data-base--ckeditor-toolbar-value": "§$AtypeOption[\"data\"]->getTypenom()§"}
     */
    private $nom;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    /**
     * attr:{"data-controller" : "base--ckeditor"}
     * attr:{"data-base--ckeditor-toolbar-value": "§$AtypeOption[\"data\"]->getTypevaleur()§"}
     */
    private $valeur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    /**
     * readonlyroot
     * TPL:no_index
     */

    private $aide;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    /**
     * hiddenroot
     * TPL:no_index
     */
    private $typenom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    /**
     * hiddenroot
     * TPL:no_index
     */
    private $typevaleur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = AllExtension::ckclean($nom);
        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(?string $valeur): self
    {
        if (substr($valeur, 0, strlen('<p>') == '<p>') and substr($valeur, 0, -strlen('</p>') == '</p>')) {
            $this->valeur = substr(substr($valeur, strlen('<p>')), 0, -strlen('</p>'));
        } else {
            $this->valeur = $valeur;
        }

        return $this;
    }

    public function getAide(): ?string
    {
        return $this->aide;
    }

    public function setAide(?string $aide): self
    {
        $this->aide = $aide;

        return $this;
    }

    public function getTypenom(): ?string
    {
        return $this->typenom;
    }

    public function setTypenom(?string $typenom): self
    {
        $this->typenom = $typenom;

        return $this;
    }

    public function getTypevaleur(): ?string
    {
        return $this->typevaleur;
    }

    public function setTypevaleur(?string $typevaleur): self
    {
        $this->typevaleur = $typevaleur;

        return $this;
    }

    #[ORM\Column(type: Types::STRING, length: 255)]
    #[Gedmo\Slug(fields: ["nom"], unique: true)]
    /** 
     * hiddenroot
     * OPT:{"required":false} 
     * OPT:{"label":"lien"} 
     */
    private $slug;
    public function getSlug(): ?string
    {
        return $this->slug;
    }
}
