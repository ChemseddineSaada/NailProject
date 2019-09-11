<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubscriptionRepository")
 * @Vich\Uploadable
 */
class Subscription
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $promo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $promo_rate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ref;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\category", inversedBy="sbuscriptions")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stock;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", inversedBy="subscriptions")
     */
    private $product;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

        /**
     * @Vich\UploadableField(mapping="subscription_images", fileNameProperty="image1")
     * @var File
     */
    private $imageFile1;

        /**
     * @Vich\UploadableField(mapping="subscription_images", fileNameProperty="image2")
     * @var File
     */
    private $imageFile2;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPromo(): ?bool
    {
        return $this->promo;
    }

    public function setPromo(bool $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getPromoRate(): ?int
    {
        return $this->promo_rate;
    }

    public function setPromoRate(?int $promo_rate): self
    {
        $this->promo_rate = $promo_rate;

        return $this;
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

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * @return Collection|category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(category $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
        }

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return Collection|product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
        }

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
    
    public function getUpdatedAt(){
        return $this->updatedAt;
    }

}
