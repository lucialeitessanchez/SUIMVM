<?php

namespace App\Repository;

use App\Entity\SmgydProcesoJudicial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SmgydProcesoJudicialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SmgydProcesoJudicial::class);
    }
}
