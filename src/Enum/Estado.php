<?php

namespace App\Enum;

enum Estado: string
{
    case EnSeguimiento = 'En seguimiento';
    case Cerrado = 'Cerrado';
    case CuidadoPersonal = 'Cuidado personal';
    case Derivado = 'Derivado';
}
