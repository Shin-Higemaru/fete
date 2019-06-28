<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=181)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=181)
     */
    private $lastname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_company;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="creator", orphanRemoval=true)
     */
    private $eventsCreated;

    /**
     * @ORM\Column(type="string", length=181)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_admin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_guest;

    public function __construct()
    {
        $this->eventsCreated = new ArrayCollection();
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getIsCompany(): ?bool
    {
        return $this->is_company;
    }

    public function setIsCompany(bool $is_company): self
    {
        $this->is_company = $is_company;

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEventsCreated(): Collection
    {
        return $this->eventsCreated;
    }

    public function addEventsCreated(Event $eventsCreated): self
    {
        if (!$this->eventsCreated->contains($eventsCreated)) {
            $this->eventsCreated[] = $eventsCreated;
            $eventsCreated->setCreator($this);
        }

        return $this;
    }

    public function removeEventsCreated(Event $eventsCreated): self
    {
        if ($this->eventsCreated->contains($eventsCreated)) {
            $this->eventsCreated->removeElement($eventsCreated);
            // set the owning side to null (unless already changed)
            if ($eventsCreated->getCreator() === $this) {
                $eventsCreated->setCreator(null);
            }
        }

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    public function setIsAdmin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    public function getIsGuest(): ?bool
    {
        return $this->is_guest;
    }

    public function setIsGuest(bool $is_guest): self
    {
        $this->is_guest = $is_guest;

        return $this;
    }

}
