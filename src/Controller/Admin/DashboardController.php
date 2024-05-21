<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $user = $this->security->getUser();

        if ($user && in_array('ROLE_USER', $user->getRoles())) {
            return $this->redirectToRoute('app_home');
        }

        
         return $this->render('admin/dashboard.html.twig');
    }

    
   

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PerfectPartner');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);

    }
}
