<?php

namespace App\Entity\base;

use App\Repository\base\ChatmessageRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Entity\base\TimeTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChatmessageRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Chatmessage
{
	use TimeTrait;
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	/**
	 * simple
	 */
	#[ORM\Column(type: 'text')]
	private $texte;

	#[ORM\ManyToOne(targetEntity: Chat::class, inversedBy: 'messages')]
	private $chat;

	/**
	 * choice
	 * options:["question","réponse"]
	 */
	#[ORM\Column(type: 'string', length: 255, nullable: true)]
	private $type = 'question';

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getTexte(): ?string
	{
		return $this->texte;
	}

	public function setTexte(string $texte): self
	{
		$this->texte = $texte;

		return $this;
	}

	public function getChat(): ?Chat
	{
		return $this->chat;
	}

	public function setChat(?Chat $chat): self
	{
		$this->chat = $chat;

		return $this;
	}

	public function getType(): ?string
	{
		return $this->type;
	}

	public function setType(?string $type): self
	{
		$this->type = $type;

		return $this;
	}
}
