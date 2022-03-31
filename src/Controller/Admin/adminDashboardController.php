<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\Gite;
use App\Entity\User;
use App\Entity\Contact;
use App\Entity\ContactDisponibilite;


class adminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="adminDashboard")
     */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(GiteCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        //return $this->render('templates/admin/adminDashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MandarineSymfony2 0')
            
            ;
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
            yield MenuItem::linktoRoute('Retour au site', 'fas fa-home', 'app_gite');
            yield MenuItem::linkToCrud('Gîtes', 'fa fa-bed', Gite::class);
            yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class);
            yield MenuItem::linkToCrud('Contacts', 'fa fa-phone', Contact::class);
            yield MenuItem::linkToCrud('Disponibilité des contacts', 'fa fa-id-card-o', ContactDisponibilite::class);

        }

}