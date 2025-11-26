<?php

namespace App\Service;

use App\Entity\Organismo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class AlertaEmailService
{
    public function __construct(
        private EntityManagerInterface $em,
        private MailerInterface $mailer
    ) {}

    /**
     * Envía un alerta a TODOS los organismos registrados.
     * * cuando se crea un nuevo caso.
     */
    public function enviarAlertaNuevoCaso(int $idCaso): void
    {
        // Obtener todos los organismos
        $organismos = $this->em->getRepository(Organismo::class)->findAll();

        foreach ($organismos as $org) {

            // ⚠️ Ajusta esto según cómo guardás los mails
            $mail = $org->getEmail();  // ← VARCHAR simple
            echo("Enviando a: " . $mail);

            if (!$mail) {
                continue;
            }

         
            $email = (new Email())
                ->from('informatica.migyd@santafe.gov.ar')
                ->to($mail)
                ->subject('Nuevo caso registrado')
                ->text("Se registró un nuevo caso en el sistema RUFEM.\nID del caso: $idCaso");

                try {
                    $this->mailer->send($email);
                } catch (\Throwable $e) {
                    dd("ERROR SMTP: " . $e->getMessage());
                    die("error".$e->getMessage());
                }
            echo "envio";
        }
       //dd("TERMINÓ SERVICE");
    }
}
