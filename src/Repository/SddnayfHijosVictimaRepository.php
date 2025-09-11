<?php

namespace App\Repository;

use App\Entity\SddnayfHijosVictima;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SddnayfHijosVictimaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SddnayfHijosVictima::class);
    }
}
