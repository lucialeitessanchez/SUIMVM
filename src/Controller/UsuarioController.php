<?php
namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/usuarios')]
class UsuarioController extends AbstractController
{
    #[Route('/', name: 'usuario_index')]
    public function index(UsuarioRepository $repo): Response
    {
        return $this->render('usuario/index.html.twig', [
            'usuarios' => $repo->findAll(),
        ]);
    }

    #[Route('/nuevo', name: 'usuario_nuevo')]
    public function nuevo(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $usuario = new Usuario();

        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($usuario);
            $em->flush();

            $this->addFlash('success', 'Usuario creado correctamente');

            return $this->redirectToRoute('usuario_index');
        }
  
        return $this->render('usuario/_form.html.twig', [
            'form'   => $form->createView(),
            'titulo'=> 'Nuevo usuario', // o Editar usuario
            'modo'  => 'new',           // o edit
        ]);
    }

    #[Route('/{id}/editar', name: 'usuario_editar')]
    public function editar(
        Usuario $usuario,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Usuario actualizado');

            return $this->redirectToRoute('usuario_index');
        }

        return $this->render('usuario/_form.html.twig', [
            'form'   => $form->createView(),
            'titulo'=> 'Editar usuario', // o Editar usuario
            'modo'  => 'edit',           // o edit
        ]);
    }

    #[Route('/{id}/desactivar', name: 'usuario_desactivar')]
    public function desactivar(
        Usuario $usuario,
        EntityManagerInterface $em
    ): Response {
        $usuario->setActivo(false);
        $em->flush();

        $this->addFlash('warning', 'Usuario desactivado');

        return $this->redirectToRoute('usuario_index');
    }
}
