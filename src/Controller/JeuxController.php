<?php

/**
 * Contrôleur de gestion des jeux vidéo
 * 
 * Ce contrôleur gère toutes les opérations CRUD sur les jeux :
 * - Affichage de la liste des jeux
 * - Ajout d'un nouveau jeu
 * - Modification d'un jeu existant
 * - Suppression d'un jeu
 * 
 * @package App\Controller
 * @author Modern Version
 * @version 2.0
 */

namespace App\Controller;

use App\Entity\Jeux;
use App\Form\JeuxType;
use App\Repository\JeuxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/jeux')]
final class JeuxController extends AbstractController
{
    #[Route(name: 'app_jeux_index', methods: ['GET'])]
    public function index(JeuxRepository $jeuxRepository): Response
    {
        return $this->render('jeux/index.html.twig', [
            'jeux' => $jeuxRepository->findAll(),
            'menuActif' => 'Jeux',
        ]);
    }

    #[Route('/new', name: 'app_jeux_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jeu = new Jeux();
        $form = $this->createForm(JeuxType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($jeu);
            $entityManager->flush();

            return $this->redirectToRoute('app_jeux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeux/new.html.twig', [
            'jeu' => $jeu,
            'form' => $form,
            'menuActif' => 'Jeux',
        ]);
    }

    #[Route('/{id}', name: 'app_jeux_show', methods: ['GET'])]
    public function show(Jeux $jeu): Response
    {
        return $this->render('jeux/show.html.twig', [
            'jeu' => $jeu,
            'menuActif' => 'Jeux',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_jeux_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Jeux $jeu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JeuxType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_jeux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeux/edit.html.twig', [
            'jeu' => $jeu,
            'form' => $form,
            'menuActif' => 'Jeux',
        ]);
    }

    #[Route('/{id}', name: 'app_jeux_delete', methods: ['POST'])]
    public function delete(Request $request, Jeux $jeu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jeu->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($jeu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_jeux_index', [], Response::HTTP_SEE_OTHER);
    }

    // Routes antérieures pour compatibilité avec les anciens liens
    #[Route('/afficher', name: 'jeux_afficher')]
    public function indexLegacy(JeuxRepository $jeuxRepository): Response
    {
        return $this->redirectToRoute('app_jeux_index');
    }
}


