<?php

namespace App\Repository;

use App\Entity\Offering;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OfferingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offering::class);
    }

    public function findActiveOrdered(): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('o.sortOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
