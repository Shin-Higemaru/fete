<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
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
     * @ORM\Column(type="string", length=181)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dday;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endDay;

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

    public function getDday(): ?\DateTimeInterface
    {
        return $this->dday;
    }

    public function setDday(\DateTimeInterface $jour): self
    {
        $this->dday = $jour;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
{
    return $this->createdAt;
}

    public function setCreatedAt(\DateTimeInterface $creer): self
    {
        $this->createdAt = $creer;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $maj): self
    {
        $this->updatedAt = $maj;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $lieu): self
    {
        $this->adresse = $lieu;

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

    public function getEndDay(): ?\DateTimeInterface
    {
        return $this->endDay;
    }

    public function setEndDay(\DateTimeInterface $endDay): self
    {
        $this->endDay = $endDay;

        return $this;
    }
}
