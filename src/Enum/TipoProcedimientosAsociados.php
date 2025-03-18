<?php

namespace App\Enum;

enum TipoProcedimientosAsociados: string
{
    case ViolenciaFamiliar = 'Violencia familiar';
    case Divorcios = 'Divorcios';
    case CuidadoPersonal = 'Cuidado personal';
    case Comunicacion = 'Comunicacion';
    case CuotaAlimentaria = 'Cuota alimentaria';
}
