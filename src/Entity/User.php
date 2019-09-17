<?php

namespace App\Entity;

use Serializable;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @Vich\Uploadable
 * @UniqueEntity("email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email(message="L'email soumis n'est pas valide.")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire minimum 8 cacartères.")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderedProducts", mappedBy="client")
     */
    private $orderedProducts;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DeliveryAddress", mappedBy="user", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $deliveryAddresses;

   /**
     * @ORM\Column(type="json_array")
     */
    private $roles = array();

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="user", orphanRemoval=true)
     */
    private $comments;


    public function __construct()
    {
        $this->orderedProducts = new ArrayCollection();
        $this->deliveryAddresses = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getUsername(){}

    public function setUsername(string $username){}
    

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


    public function setRoles(array $roles)
    {
        $this->roles = $roles;
        return $this;
    }
    
    public function getRoles()
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function getSalt(){}
    public function eraseCredentials(){}
    public function serialize(){}
    public function unserialize($serialized){}
    public function __toString(){
    
        return $this->name;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }


    
}
