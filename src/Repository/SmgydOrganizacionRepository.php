<?php

namespace App\Repository;

use App\Entity\SmgydOrganizacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SmgydOrganizacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SmgydOrganizacion::class);
    }
}
