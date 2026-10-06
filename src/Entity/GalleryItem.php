<?php

namespace App\Entity;

use App\Repository\GalleryItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalleryItemRepository::class)]
class GalleryItem
{
    public const CATEGORY_YOUNG_PEOPLE = 'young_people';
    public const CATEGORY_CAMPUS_WORK = 'campus_work';
    public const CATEGORY_HOME_MEETINGS = 'home_meetings';
    public const CATEGORY_CHURCHING_SAINTS = 'churching_saints';
    public const CATEGORY_MEETINGS = 'meetings';

    public const CATEGORIES = [
        self::CATEGORY_YOUNG_PEOPLE    => 'Young People',
        self::CATEGORY_CAMPUS_WORK     => 'Campus Work',
        self::CATEGORY_HOME_MEETINGS   => 'Home Meetings',
        self::CATEGORY_CHURCHING_SAINTS => 'Churching Saints',
        self::CATEGORY_MEETINGS        => 'Meetings',
    ];

    public const TYPE_PHOTO = 'photo';
    public const TYPE_TESTIMONY = 'testimony';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $category = null;

    #[ORM\Column(length: 20)]
    private string $type = self::TYPE_PHOTO;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $author = null;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $publishedAt = null;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->publishedAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getCategory(): ?string { return $this->category; }

    public function setCategory(string $category): static { $this->category = $category; return $this; }

    public function getCategoryLabel(): string
    {
        return self::CATEGORIES[$this->category] ?? $this->category;
    }

    public function getType(): string { return $this->type; }

    public function setType(string $type): static { $this->type = $type; return $this; }

    public function isPhoto(): bool { return $this->type === self::TYPE_PHOTO; }

    public function isTestimony(): bool { return $this->type === self::TYPE_TESTIMONY; }

    public function getTitle(): ?string { return $this->title; }

    public function setTitle(string $title): static { $this->title = $title; return $this; }

    public function getDescription(): ?string { return $this->description; }

    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getImageFilename(): ?string { return $this->imageFilename; }

    public function setImageFilename(?string $imageFilename): static { $this->imageFilename = $imageFilename; return $this; }

    public function getAuthor(): ?string { return $this->author; }

    public function setAuthor(?string $author): static { $this->author = $author; return $this; }

    public function isActive(): bool { return $this->isActive; }

    public function setIsActive(bool $isActive): static { $this->isActive = $isActive; return $this; }

    public function getPublishedAt(): ?\DateTimeInterface { return $this->publishedAt; }

    public function setPublishedAt(\DateTimeInterface $publishedAt): static { $this->publishedAt = $publishedAt; return $this; }

    public function getCreatedAt(): \DateTimeImmutable { return $this->createdAt; }
}
