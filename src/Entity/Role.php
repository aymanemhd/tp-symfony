<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $RoleName = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Statue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getRoleName(): ?string
    {
        return $this->RoleName;
    }

    public function setRoleName(?string $RoleName): self
    {
        $this->RoleName = $RoleName;

        return $this;
    }

    public function isStatue(): ?bool
    {
        return $this->Statue;
    }

    public function setStatue(?bool $Statue): self
    {
        $this->Statue = $Statue;

        return $this;
    }
}
