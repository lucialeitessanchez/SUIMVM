<?php

namespace App\Repository;

use App\Entity\Caso;
use App\Entity\Mpa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MpaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mpa::class);
    }

    public function findByCasoWithTipoViolencia(Caso $caso): array
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.tiposViolencia', 'tv')
            ->addSelect('tv')
            ->where('m.caso = :caso')
            ->setParameter('caso', $caso)
            ->getQuery()
            ->getResult();
    }

}
