<?php
namespace App\Service;

use App\Repository\CajRepository;
use App\Repository\SdhRepository;
use App\Repository\MpaRepository;
use App\Repository\GobLocalesRepository;
use App\Entity\Caso;

class CasoTabsDataProvider
{
    private $cajRepository;
    private $sdhRepository;
    private $mpaRepository;
    private $gobLocalesRepository;

    public function __construct(CajRepository $cajRepository, SdhRepository $sdhRepository, 
    MpaRepository $mpaRepository, GobLocalesRepository $gobLocalesRepository)
    {
        $this->cajRepository = $cajRepository;
        $this->sdhRepository = $sdhRepository;
        $this->mpaRepository = $mpaRepository;
        $this->gobLocalesRepository = $gobLocalesRepository;
    }

    public function getData(Caso $caso): array
    {
        return [
            'caj' => $this->cajRepository->findBy(['caso' => $caso]),
            'sdh' => $this->sdhRepository->findBy(['caso' => $caso]),
            'gl' => $this->gobLocalesRepository->findBy(['caso' => $caso]),
            'mpa' => $this->mpaRepository->findBy(['caso' => $caso]),
            //'mpa' => $this->mpaRepository->findByCasoWithTipoViolencia($caso),
           
              
        ];
    }
}
