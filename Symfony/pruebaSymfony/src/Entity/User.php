<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class, mappedBy="Users")
     */
    private $grupo;

    public function __construct()
    {
        $this->grupos = new ArrayCollection();
        $this->grupo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addGrupo(Group $grupo): self
    {
        if (!$this->grupos->contains($grupo)) {
            $this->grupos[] = $grupo;
            $grupo->addUser($this);
        }

        return $this;
    }

    public function removeGrupo(Group $grupo): self
    {
        if ($this->grupos->removeElement($grupo)) {
            $grupo->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGrupo(): Collection
    {
        return $this->grupo;
    }
}
