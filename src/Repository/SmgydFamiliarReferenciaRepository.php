<?php

namespace App\Repository;

use App\Entity\SmgydFamiliarReferencia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SmgydFamiliarReferenciaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SmgydFamiliarReferencia::class);
    }
}
