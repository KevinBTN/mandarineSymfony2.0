<?php

namespace App\Controller;

use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Entity\Gite;
use App\Repository\GiteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\Persistence\ManagerRegistry;


class GiteController extends AbstractController
{
    #[Route('/gite', name: 'app_gite')]
    public function index(Request $request, GiteRepository $ripo, PaginatorInterface $paginator)
    {

        $propertySearch = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class,$propertySearch);
        $form->handleRequest($request);

        $gites = $ripo->findAll();

        $gites = $paginator->paginate(
            $gites,
            $request->query->getInt('page', 1) /* page number */,
            9 /* limit par page */
        );

        if($form->isSubmitted() && $form->isValid()){
            
                $criteria = $form->getData();
                $gites = $ripo->findByForSearch($criteria);

                $gites = $paginator->paginate(
                    $gites,
                    $request->query->getInt('page', 1) /* page number */,
                        9 /* limit par page */
                    );

        }else{
    
            $gites = $ripo->findAll();

            $gites = $paginator->paginate(
            $gites,
            $request->query->getInt('page', 1) /* page number */,
                9 /* limit par page */
            );
        }
                //$gites = $ripo->findBy($value);
        

        return $this->render('gite/index.html.twig', [
            'form' => $form->createView(),
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
    public function contactNom(ManagerRegistry $doctrine, int $id): Response
    {
        $gite = $doctrine->getRepository(Gite::class)->findOneByIdJoinedToContact($id);

        return $contactNom = $gite->getNom();

    }

}