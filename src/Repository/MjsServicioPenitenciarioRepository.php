<?php

namespace App\Repository;

use App\Entity\Mjs;
use App\Entity\MjsServicioPenitenciario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MjsServicioPenitenciarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MjsServicioPenitenciario::class);
    }
}
