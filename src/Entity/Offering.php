<?php

namespace App\Entity;

use App\Repository\OfferingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferingRepository::class)]
class Offering
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $method = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $accountName = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $accountNumber = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $icon = null;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\Column]
    private int $sortOrder = 0;

    public function getId(): ?int { return $this->id; }

    public function getMethod(): ?string { return $this->method; }

    public function setMethod(string $method): static { $this->method = $method; return $this; }

    public function getAccountName(): ?string { return $this->accountName; }

    public function setAccountName(?string $accountName): static { $this->accountName = $accountName; return $this; }

    public function getAccountNumber(): ?string { return $this->accountNumber; }

    public function setAccountNumber(?string $accountNumber): static { $this->accountNumber = $accountNumber; return $this; }

    public function getDescription(): ?string { return $this->description; }

    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getIcon(): ?string { return $this->icon; }

    public function setIcon(?string $icon): static { $this->icon = $icon; return $this; }

    public function isActive(): bool { return $this->isActive; }

    public function setIsActive(bool $isActive): static { $this->isActive = $isActive; return $this; }

    public function getSortOrder(): int { return $this->sortOrder; }

    public function setSortOrder(int $sortOrder): static { $this->sortOrder = $sortOrder; return $this; }
}
