<?php
namespace App\Service;

use App\Entity\Persona;

class PersonaService
{
    public function getDatosPersona(Persona $persona): array
    {
        return [
            'nombre' => $persona->getNombre(),
            'apellido' => $persona->getApellido(),
            'nrodoc' => $persona->getNrodoc(),
            'sexo' => $persona->getSexo(),
            'genero' => $persona->getGeneroAutop(),
            'nacionalidad' => $persona->getNacionalidad(),
        ];
    }
}
