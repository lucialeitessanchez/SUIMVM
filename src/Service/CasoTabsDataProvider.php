<?php
namespace App\Service;

use App\Repository\CajRepository;
use App\Repository\SdhRepository;
use App\Repository\MpaRepository;
use App\Repository\GobLocalesRepository;
use App\Repository\SmgydRepository;
use App\Repository\SddnayfNewRepository;
use App\Repository\PgcsjRepository;
use App\Repository\MjsRepository;
use App\Entity\Caso;

class CasoTabsDataProvider
{
    private $cajRepository;
    private $sdhRepository;
    private $mpaRepository;
    private $gobLocalesRepository;
    private $smgydRepository;
    private $sddnayfNewRepository;
    private $pgcsjRepository;
    private $mjsRepository;

    public function __construct(CajRepository $cajRepository, SdhRepository $sdhRepository, 
    MpaRepository $mpaRepository, GobLocalesRepository $gobLocalesRepository, 
    SmgydRepository $smgydRepository,SddnayfNewRepository $sddnayfNewRepository,PgcsjRepository $pgcsjRepository, MjsRepository $mjsRepository)
    {
        $this->cajRepository = $cajRepository;
        $this->sdhRepository = $sdhRepository;
        $this->mpaRepository = $mpaRepository;
        $this->gobLocalesRepository = $gobLocalesRepository;
        $this->smgydRepository = $smgydRepository;
        $this->sddnayfNewRepository = $sddnayfNewRepository;
        $this->pgcsjRepository= $pgcsjRepository;
        $this->mjsRepository = $mjsRepository;
    }

    public function getData(Caso $caso): array
    {
      /*  return [
            'caj' => $this->cajRepository->findBy(['caso' => $caso]),
            'sdh' => $this->sdhRepository->findBy(['caso' => $caso]),
            'gl' => $this->gobLocalesRepository->findBy(['caso' => $caso]),
            'mpa' => $this->mpaRepository->findBy(['caso' => $caso]),
            'smgyd'=> $this->smgydRepository->findBy(['caso' => $caso],),
            'sddnayf'=> $this->sddnayfNewRepository->findBy(['caso' => $caso],)
            //'mpa' => $this->mpaRepository->findByCasoWithTipoViolencia($caso),
           
        ];*/
           
        return [
            'caj' => $this->cajRepository->findBy(['caso' => $caso]) ?: [],
            'sdh' => $this->sdhRepository->findBy(['caso' => $caso]) ?: [],
            'gl' => $this->gobLocalesRepository->findBy(['caso' => $caso]) ?: [],
            'mpa' => $this->mpaRepository->findBy(['caso' => $caso]) ?: [],
            'smgyd' => $this->smgydRepository->findBy(['caso' => $caso]) ?: [],
            'sddnayf' => $this->sddnayfNewRepository->findBy(['caso' => $caso]) ?: [],
            'pgcsj' => $this->pgcsjRepository->findBy(['caso' => $caso]) ?: [],
            'mjs_sp'=>$this->mjsRepository->findBy(['caso'=>$caso])?:[],
        ];
    }
}
