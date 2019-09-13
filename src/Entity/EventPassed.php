<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventPassedRepository")
 * @Vich\Uploadable
 */
class EventPassed
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Event", inversedBy="eventPassed", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $events;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $article;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

        /**
     * @Vich\UploadableField(mapping="event_passed_images", fileNameProperty="image1")
     * @var File
     */
    private $imageFile1;

    /**
     * @Vich\UploadableField(mapping="event_passed_images", fileNameProperty="image2")
     * @var File
     */
    private $imageFile2;

    /**
     * @Vich\UploadableField(mapping="event_passed_images", fileNameProperty="image3")
     * @var File
     */
    private $imageFile3;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvents(): ?event
    {
        return $this->events;
    }

    public function setEvents(event $events): self
    {
        $this->events = $events;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(?string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function setImageFile1(File $image1 = null)
    {
        $this->imageFile1 = $image1;

        if ($image1) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile1()
    {
        return $this->imageFile1;
    }

    public function setImageFile2(File $image2 = null)
    {
        $this->imageFile2 = $image2;

        if ($image2) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile2()
    {
        return $this->imageFile2;
    }

    

    public function setImageFile3(File $image3 = null)
    {
        $this->imageFile3 = $image3;

        if ($image3) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile3()
    {
        return $this->imageFile3;
    }

    public function __toString(){
        return "Événement passé";
    }

    public function getUpdatedAt(){
        return $this->updatedAt;
    }
}
