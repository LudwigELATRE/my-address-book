<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnnuaireController extends AbstractController
{
    #[Route('/', name: 'app_annuaire')]
    public function index(ContactRepository $contactRepository): Response
    {
        $contacts = [
            ['nom' => 'Doe', 'prenom' => 'John', 'telephone' => '0123456789'],
            ['nom' => 'Doe', 'prenom' => 'Jane', 'telephone' => '0123456789'],
            ['nom' => 'Doe', 'prenom' => 'Alice', 'telephone' => '0123456789'],
            ['nom' => 'Doe', 'prenom' => 'Bob', 'telephone' => '0123456789'],
            ['nom' => 'Doe', 'prenom' => 'Eve', 'telephone' => '0123456789'],
        ];
        return $this->render('annuaire/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    #[Route('/test', name: 'test')]
    public function test(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();
        dd($contacts);
        return $this->render('annuaire/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
