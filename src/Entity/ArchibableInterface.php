<?php
namespace App\Entity;

interface ArchivableInterface
{
    public function addArchivo(Archivo $archivo): void;
}