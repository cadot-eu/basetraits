<?php

namespace App\Entity\base;

use App\Entity\base\SlugTrait;
use App\Repository\base\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use App\Entity\base\TimeTrait;
use App\Entity\base\VuesTrait;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Categorie
{
	use TimeTrait;
	use VuesTrait;
	use SlugTrait;

	/**
	 * tpl:no_created
	 * tpl:no_updated
	 * slug:nom
	 */
	#[ORM\Id, ORM\GeneratedValue, ORM\Column(type: Types::INTEGER)]
	private $id;

	#[ORM\Column(type: Types::STRING, length: 255)]
	private $nom;

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
		$this->nom = $nom;

		return $this;
	}
}
