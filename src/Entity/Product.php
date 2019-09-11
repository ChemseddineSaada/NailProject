<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $price;

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

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $promo_rate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $state;

    /**
     * @ORM\Column(type="boolean")
     */
    private $promo;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PackOffer", mappedBy="products")
     */
    private $packOffers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Subscription", mappedBy="product")
     */
    private $subscriptions;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PTypes", inversedBy="products")
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $top_product;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image4;


    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image1")
     * @var File
     */
    private $imageFile1;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image2")
     * @var File
     */
    private $imageFile2;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image3")
     * @var File
     */
    private $imageFile3;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image4")
     * @var File
     */
    private $imageFile4;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;


    public function __construct()
    {
        $this->orderedProducts = new ArrayCollection();
        $this->packOffers = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
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

    public function setPrice(?string $price): self
    {
        $this->price = $price;

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

    public function getPromoRate(): ?int
    {
        return $this->promo_rate;
    }

    public function setPromoRate(?int $promo_rate): self
    {
        $this->promo_rate = $promo_rate;

        return $this;
    }

    public function __toString(){
        
        return $this->name;
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

    public function getPromo(): ?bool
    {
        return $this->promo;
    }

    public function setPromo(bool $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * @return Collection|PackOffer[]
     */
    public function getPackOffers(): Collection
    {
        return $this->packOffers;
    }

    public function addPackOffer(PackOffer $packOffer): self
    {
        if (!$this->packOffers->contains($packOffer)) {
            $this->packOffers[] = $packOffer;
            $packOffer->addProduct($this);
        }

        return $this;
    }

    public function removePackOffer(PackOffer $packOffer): self
    {
        if ($this->packOffers->contains($packOffer)) {
            $this->packOffers->removeElement($packOffer);
            $packOffer->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(Subscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
            $subscription->addProduct($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->contains($subscription)) {
            $this->subscriptions->removeElement($subscription);
            $subscription->removeProduct($this);
        }

        return $this;
    }

    public function getType(): ?PTypes
    {
        return $this->type;
    }

    public function setType(?PTypes $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTopProduct(): ?bool
    {
        return $this->top_product;
    }

    public function setTopProduct(bool $top_product): self
    {
        $this->top_product = $top_product;

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

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(?string $image4): self
    {
        $this->image4 = $image4;

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

    public function setImageFile4(File $image4 = null)
    {
        $this->imageFile4 = $image4;

        if ($image4) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile4()
    {
        return $this->imageFile4;
    }

    public function getUpdatedAt(){
        return $this->updatedAt;
    }

}
