<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @Vich\Uploadable
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $event_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $event_place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="event_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\EventPassed", mappedBy="events", cascade={"persist", "remove"})
     */
    private $eventPassed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $state;

    /**
     * @ORM\Column(type="text")
     */
    private $annoncement;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->event_date;
    }

    public function setEventDate(?\DateTimeInterface $event_date): self
    {
        $this->event_date = $event_date;

        return $this;
    }

    public function getEventPlace(): ?string
    {
        return $this->event_place;
    }

    public function setEventPlace(?string $event_place): self
    {
        $this->event_place = $event_place;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEventPassed(): ?EventPassed
    {
        return $this->eventPassed;
    }

    public function setEventPassed(EventPassed $eventPassed): self
    {
        $this->eventPassed = $eventPassed;

        // set the owning side of the relation if necessary
        if ($this !== $eventPassed->getEvents()) {
            $eventPassed->setEvents($this);
        }

        return $this;
    }

    public function __toString(){
        return $this->title;
    }

    public function getState(): ?bool
    {
        return $this->state;
    }

    public function setState(bool $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    public function getAnnoncement(): ?string
    {
        return $this->annoncement;
    }

    public function setAnnoncement(string $annoncement): self
    {
        $this->annoncement = $annoncement;

        return $this;
    }

}
