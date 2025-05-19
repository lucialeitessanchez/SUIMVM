<?php

namespace App\Repository;

use App\Entity\Caso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Caso>
 *
 * @method Caso|null find($id, $lockMode = null, $lockVersion = null)
 * @method Caso|null findOneBy(array $criteria, array $orderBy = null)
 * @method Caso[]    findAll()
 * @method Caso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Caso::class);
    }

    // Ejemplo de método personalizado:
    public function findUltimosCasos(int $cantidad = 10): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.fechaIngreso', 'DESC')
            ->setMaxResults($cantidad)
            ->getQuery()
            ->getResult();
    }
}
