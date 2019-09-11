<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PackOfferRepository")
 * @Vich\Uploadable
 */
class PackOffer
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
     * @ORM\Column(type="string", length=100)
     */
    private $ref;


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
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", inversedBy="packOffers")
     */
    private $products;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\category")
     */
    private $category;

    /**
     * @ORM\Column(type="boolean")
     */
    private $home_view;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @Vich\UploadableField(mapping="packOffer_images", fileNameProperty="image1")
     * @var File
     */
    private $imageFile1;

        /**
     * @Vich\UploadableField(mapping="packOffer_images", fileNameProperty="image2")
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
        $this->products = new ArrayCollection();
        $this->category = new ArrayCollection();
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

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

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

    /**
     * @return Collection|product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
        }

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

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

    public function getHomeView(): ?bool
    {
        return $this->home_view;
    }

    public function setHomeView(bool $home_view): self
    {
        $this->home_view = $home_view;

        return $this;
    }
    public function __toString(){
        return $this->name;
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
