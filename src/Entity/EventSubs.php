<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventSubsRepository")
 * @UniqueEntity(
 *      fields= {"email"},
 *      message="Vous êtes déjà inscris à un événement"
 * )
 */
class EventSubs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\NotBlank(message="Veuillez entrer votre email")
     * @Assert\Email(message="L'email soumis n'est pas valide.")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Veuilez entrer votre prénom")
     * @Assert\Regex(
     *  pattern="/\d/",
     *  match=false,
     *  message="Votre nom ne peut pas contenir de nombre"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Veuilez entrer votre nom")
     * @Assert\Regex(
     *  pattern="/\d/",
     *  match=false,
     *  message="Votre nom ne peut pas contenir de nombre"
     * )
     */
    private $first_name;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\event", inversedBy="eventSubs", cascade = "persist")
     */
    private $event;

    public function __construct()
    {
        $this->event = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return Collection|event[]
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvent(event $event): self
    {
        if (!$this->event->contains($event)) {
            $this->event[] = $event;
        }

        return $this;
    }

    public function removeEvent(event $event): self
    {
        if ($this->event->contains($event)) {
            $this->event->removeElement($event);
        }

        return $this;
    }
}
