<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Usuario as EntityUsuario;
use App\Form\Model\UsuarioBusquedaModel;

use function in_array;

class UsuarioRepository extends ServiceEntityRepository 
{
    
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntityUsuario::class);
    }

    /*public function findByUsuarioBusqueda(App\Repository\UsuarioBusquedaModel $usuarioBusqueda) 
    {
        $entityManager = $this->getEntityManager();
        $dql = 'SELECT u,r '
                .' FROM '.Usuario::class.' u '
                .'      LEFT JOIN u.roles r'
                .' WHERE 1=1 ';
        $dql = $usuarioBusqueda->addToDql($dql);
        //$dql .= ' ORDER BY u.usuaApellido, u.usuaNombre ';
        
        $query = $entityManager->createQuery($dql)->setParameters($usuarioBusqueda->getFiltros());

        return $query;
    }*/
   
}
