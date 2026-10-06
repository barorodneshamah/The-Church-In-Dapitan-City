<?php

namespace App\Entity;

use App\Repository\RelatedLinkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelatedLinkRepository::class)]
class RelatedLink
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 500)]
    private ?string $url = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $logoUrl = null;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\Column]
    private int $sortOrder = 0;

    public function getId(): ?int { return $this->id; }

    public function getTitle(): ?string { return $this->title; }

    public function setTitle(string $title): static { $this->title = $title; return $this; }

    public function getUrl(): ?string { return $this->url; }

    public function setUrl(string $url): static { $this->url = $url; return $this; }

    public function getDescription(): ?string { return $this->description; }

    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getLogoUrl(): ?string { return $this->logoUrl; }

    public function setLogoUrl(?string $logoUrl): static { $this->logoUrl = $logoUrl; return $this; }

    public function isActive(): bool { return $this->isActive; }

    public function setIsActive(bool $isActive): static { $this->isActive = $isActive; return $this; }

    public function getSortOrder(): int { return $this->sortOrder; }

    public function setSortOrder(int $sortOrder): static { $this->sortOrder = $sortOrder; return $this; }
}
