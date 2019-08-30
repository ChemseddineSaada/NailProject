<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderedProductsRepository")
 */
class OrderedProducts
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="orderedProducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orderedProducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ordred_at;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $state;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DeliveryAddress")
     * @ORM\JoinColumn(nullable=false)
     */
    private $delivery_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $payment_type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $registered;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getOrdredAt(): ?\DateTimeInterface
    {
        return $this->ordred_at;
    }

    public function setOrdredAt(\DateTimeInterface $ordred_at): self
    {
        $this->ordred_at = $ordred_at;

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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDeliveryAddress(): ?DeliveryAddress
    {
        return $this->delivery_address;
    }

    public function setDeliveryAddress(?DeliveryAddress $delivery_address): self
    {
        $this->delivery_address = $delivery_address;

        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->payment_type;
    }

    public function setPaymentType(string $payment_type): self
    {
        $this->payment_type = $payment_type;

        return $this;
    }

    public function getRegistered(): ?string
    {
        return $this->registered;
    }

    public function setRegistered(string $registered): self
    {
        $this->registered = $registered;

        return $this;
    }
}
