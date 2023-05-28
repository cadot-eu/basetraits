<?php

namespace App\Entity\base;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Categorie;

trait CategoriesTrait
{
    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }
    #[ORM\ManyToMany(targetEntity: Categorie::class, cascade: ["remove", "persist"])]
    /**
     * entity
     * label:nom
     * OPT:{"help":"multiple sélection et retirer une sélection avec CTRL + click"}
     * OPT:{"required":false}
     * tpl:no_index
     */
    private $categories;
    /**
     * @return Collection
     */
    public function getCategories(): Collection
    {
        if ($this->categories == null) {
            $this->categories = new ArrayCollection();
        }
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }
    public function setCategories($categories): self
    {
        $this->categories = $categories;

        return $this;
    }
    public function removeCategory(Categorie $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }
    public function getCategoriesjoin(): string
    {
        $res = '';
        foreach ($this->categories as $cat) {
            $res .= $cat->getNom() . ',';
        }
        return substr($res, 0, -1);
    }
    public function hasCategorie(?Categorie $category): bool
    {
        if ($category == null) {
            return false;
        }
        foreach ($this->categories as $cat) {
            if ($cat == $category) {
                return true;
            }
        }
        return false;
    }
    public function removeAllCategory(): self
    {
        foreach ($this->categories as $cat) {
                $this->categories->removeElement($cat);
        }
        return $this;
    }
    public function getCategoriesArrayofNom(): array
    {
        $res = [];
        foreach ($this->categories as $cat) {
            $res[] = $cat->getNom();
        }
        return $res;
    }
}
