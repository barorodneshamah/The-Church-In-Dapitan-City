<?php

namespace App\Repository;

use App\Entity\GalleryItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GalleryItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GalleryItem::class);
    }

    public function findByCategory(string $category): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.category = :category')
            ->andWhere('g.isActive = :active')
            ->setParameter('category', $category)
            ->setParameter('active', true)
            ->orderBy('g.publishedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findPhotos(?string $category = null): array
    {
        $qb = $this->createQueryBuilder('g')
            ->andWhere('g.type = :type')
            ->andWhere('g.isActive = :active')
            ->setParameter('type', GalleryItem::TYPE_PHOTO)
            ->setParameter('active', true)
            ->orderBy('g.publishedAt', 'DESC');

        if ($category) {
            $qb->andWhere('g.category = :category')->setParameter('category', $category);
        }

        return $qb->getQuery()->getResult();
    }

    public function findTestimonies(?string $category = null): array
    {
        $qb = $this->createQueryBuilder('g')
            ->andWhere('g.type = :type')
            ->andWhere('g.isActive = :active')
            ->setParameter('type', GalleryItem::TYPE_TESTIMONY)
            ->setParameter('active', true)
            ->orderBy('g.publishedAt', 'DESC');

        if ($category) {
            $qb->andWhere('g.category = :category')->setParameter('category', $category);
        }

        return $qb->getQuery()->getResult();
    }
}
