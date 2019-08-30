<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderedProducts", mappedBy="client")
     */
    private $orderedProducts;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DeliveryAddress", mappedBy="user")
     */
    private $deliveryAddresses;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Cart", mappedBy="user", cascade={"persist", "remove"})
     */
    private $cart;

    public function __construct()
    {
        $this->orderedProducts = new ArrayCollection();
        $this->deliveryAddresses = new ArrayCollection();
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

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

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
            $orderedProduct->setClient($this);
        }

        return $this;
    }

    public function removeOrderedProduct(OrderedProducts $orderedProduct): self
    {
        if ($this->orderedProducts->contains($orderedProduct)) {
            $this->orderedProducts->removeElement($orderedProduct);
            // set the owning side to null (unless already changed)
            if ($orderedProduct->getClient() === $this) {
                $orderedProduct->setClient(null);
            }
        }

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * @return Collection|DeliveryAddress[]
     */
    public function getDeliveryAddresses(): Collection
    {
        return $this->deliveryAddresses;
    }

    public function addDeliveryAddress(DeliveryAddress $deliveryAddress): self
    {
        if (!$this->deliveryAddresses->contains($deliveryAddress)) {
            $this->deliveryAddresses[] = $deliveryAddress;
            $deliveryAddress->setUser($this);
        }

        return $this;
    }

    public function removeDeliveryAddress(DeliveryAddress $deliveryAddress): self
    {
        if ($this->deliveryAddresses->contains($deliveryAddress)) {
            $this->deliveryAddresses->removeElement($deliveryAddress);
            // set the owning side to null (unless already changed)
            if ($deliveryAddress->getUser() === $this) {
                $deliveryAddress->setUser(null);
            }
        }

        return $this;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): self
    {
        $this->cart = $cart;

        // set (or unset) the owning side of the relation if necessary
        $newUser = $cart === null ? null : $this;
        if ($newUser !== $cart->getUser()) {
            $cart->setUser($newUser);
        }

        return $this;
    }
}
