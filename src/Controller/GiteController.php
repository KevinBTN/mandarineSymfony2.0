<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Repository\GiteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{
    #[Route('/gite', name: 'app_gite')]
    public function index(Request $request, GiteRepository $ripo, PaginatorInterface $paginator)
    {
        $gites = $ripo->findAll();

        $gites = $paginator->paginate(
            $gites,
            $request->query->getInt('page', 1) /* page number */,
            9 /* limit par page */
        );

        return $this->render('gite/index.html.twig', [
            'gites' => $gites
        ]);
    }

    #[Route('/gite/{id}', name: 'show_gite')]
    public function show(Gite $gite)
    {
        return $this->render('gite/gite.html.twig', [
            'gite' => $gite
        ]);
    }
}
