<?php
namespace App\Service;

use App\Repository\CajRepository;
use App\Repository\SdhRepository;
use App\Repository\MpaRepository;
use App\Entity\Caso;

class CasoTabsDataProvider
{
    private $cajRepository;
    private $sdhRepository;
    private $mpaRepository;

    public function __construct(CajRepository $cajRepository, SdhRepository $sdhRepository, MpaRepository $mpaRepository)
    {
        $this->cajRepository = $cajRepository;
        $this->sdhRepository = $sdhRepository;
        $this->mpaRepository = $mpaRepository;
    }

    public function getData(Caso $caso): array
    {
        return [
            'caj' => $this->cajRepository->findBy(['caso' => $caso]),
            'sdh' => $this->sdhRepository->findBy(['caso' => $caso]),
            //'mpa' => $this->mpaRepository->findBy(['caso' => $caso]),
            'mpa' => $this->mpaRepository->findByCasoWithTipoViolencia($caso),
              
        ];
    }
}
