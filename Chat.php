<?php

namespace App\Entity\base;

use App\Repository\ChatRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Entity\base\TimeTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChatRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Chat
{
	use TimeTrait;
	/**
	 * SEARCH:['id','user']
	 */
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	#[ORM\Column(type: 'string', length: 255)]
	private $user;

	#[
		ORM\OneToMany(
			mappedBy: 'chat',
			targetEntity: Chatmessage::class,
			cascade: ['persist', 'remove']
		)
	]
	private $messages;

	public function __construct()
	{
		$this->messages = new ArrayCollection();
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getUser(): ?string
	{
		return $this->user;
	}

	public function setUser(string $user): self
	{
		$this->user = $user;

		return $this;
	}

	/**
	 * @return Collection<int, Chatmessage>
	 */
	public function getMessages(): Collection
	{
		return $this->messages;
	}

	public function addMessage(Chatmessage $message): self
	{
		if (!$this->messages->contains($message)) {
			$this->messages[] = $message;
			$message->setChat($this);
		}

		return $this;
	}

	public function removeMessage(Chatmessage $message): self
	{
		if ($this->messages->removeElement($message)) {
			// set the owning side to null (unless already changed)
			if ($message->getChat() === $this) {
				$message->setChat(null);
			}
		}

		return $this;
	}
}
