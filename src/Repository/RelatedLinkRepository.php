<?php

namespace App\Repository;

use App\Entity\RelatedLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RelatedLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RelatedLink::class);
    }

    public function findActiveOrdered(): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('r.sortOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
