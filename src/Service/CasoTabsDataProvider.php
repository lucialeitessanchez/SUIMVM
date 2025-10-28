<?php
namespace App\Service;

use App\Repository\CajRepository;
use App\Repository\SdhRepository;
use App\Repository\MpaRepository;
use App\Repository\GobLocalesRepository;
use App\Repository\SmgydRepository;
use App\Repository\SddnayfNewRepository;
use App\Repository\PgcsjRepository;
use App\Entity\Caso;
use App\Repository\MjsServicioPenitenciarioRepository;

class CasoTabsDataProvider
{
    private $cajRepository;
    private $sdhRepository;
    private $mpaRepository;
    private $gobLocalesRepository;
    private $smgydRepository;
    private $sddnayfNewRepository;
    private $pgcsjRepository;
    private $mjsServicioPenitenciarioRepository;

    public function __construct(CajRepository $cajRepository, SdhRepository $sdhRepository, 
    MpaRepository $mpaRepository, GobLocalesRepository $gobLocalesRepository, 
    SmgydRepository $smgydRepository,SddnayfNewRepository $sddnayfNewRepository,PgcsjRepository $pgcsjRepository,MjsServicioPenitenciarioRepository $mjsServicioPenitenciarioRepository)
    {
        $this->cajRepository = $cajRepository;
        $this->sdhRepository = $sdhRepository;
        $this->mpaRepository = $mpaRepository;
        $this->gobLocalesRepository = $gobLocalesRepository;
        $this->smgydRepository = $smgydRepository;
        $this->sddnayfNewRepository = $sddnayfNewRepository;
        $this->pgcsjRepository= $pgcsjRepository;
        $this->mjsServicioPenitenciarioRepository = $mjsServicioPenitenciarioRepository;
    }

    public function getData(Caso $caso): array
    {
        
        return [
            'caj' => $this->cajRepository->findBy(['caso' => $caso]) ?: [],
            'sdh' => $this->sdhRepository->findBy(['caso' => $caso]) ?: [],
            'gl' => $this->gobLocalesRepository->findBy(['caso' => $caso]) ?: [],
            'mpa' => $this->mpaRepository->findBy(['caso' => $caso]) ?: [],
            'smgyd' => $this->smgydRepository->findBy(['caso' => $caso]) ?: [],
            'sddnayf' => $this->sddnayfNewRepository->findBy(['caso' => $caso]) ?: [],
            'pgcsj' => $this->pgcsjRepository->findBy(['caso' => $caso]) ?: [],
            'mjs_sp'=>$this->mjsServicioPenitenciarioRepository->findBy(['caso'=>$caso])?:[],


        ];
    }
}
