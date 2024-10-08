<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(RegistrationType::class, new User());
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->addFlash('success', 'Form is valid');
                return $this->redirectToRoute('index');
            } else {
                $this->addFlash('error', 'Form is not valid');
            }
        }

        return $this->render('index.html.twig', [
            'form' => $form,
        ]);
    }
}
