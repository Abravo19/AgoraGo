<?php

namespace App\Controller;

use App\Entity\LoginTrace;
use App\Form\LoginTraceType;
use App\Repository\LoginTraceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/login/trace')]
#[IsGranted('ROLE_ADMIN')]
final class LoginTraceController extends AbstractController
{
    #[Route('/', name: 'app_login_trace_index', methods: ['GET'])]
    public function index(LoginTraceRepository $loginTraceRepository): Response
    {
        return $this->render('login_trace/index.html.twig', [
            'login_traces' => $loginTraceRepository->findAllOrderedByDateDesc(),
            'menuActif' => 'Membres'
        ]);
    }
}
