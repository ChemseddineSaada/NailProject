<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $images = [];

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $state;

    /**
     * @ORM\Column(type="datetime")
     */
    private $published_at;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $promo;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ref;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderedProducts", mappedBy="product")
     */
    private $orderedProducts;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\category", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function __construct()
    {
        $this->orderedProducts = new ArrayCollection();
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

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->published_at;
    }

    public function setPublishedAt(\DateTimeInterface $published_at): self
    {
        $this->published_at = $published_at;

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

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getPromo(): ?string
    {
        return $this->promo;
    }

    public function setPromo(?string $promo): self
    {
        $this->promo = $promo;

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
     * @return Collection|OrderedProducts[]
     */
    public function getOrderedProducts(): Collection
    {
        return $this->orderedProducts;
    }

    public function addOrderedProduct(OrderedProducts $orderedProduct): self
    {
        if (!$this->orderedProducts->contains($orderedProduct)) {
            $this->orderedProducts[] = $orderedProduct;
            $orderedProduct->setProduct($this);
        }

        return $this;
    }

    public function removeOrderedProduct(OrderedProducts $orderedProduct): self
    {
        if ($this->orderedProducts->contains($orderedProduct)) {
            $this->orderedProducts->removeElement($orderedProduct);
            // set the owning side to null (unless already changed)
            if ($orderedProduct->getProduct() === $this) {
                $orderedProduct->setProduct(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
