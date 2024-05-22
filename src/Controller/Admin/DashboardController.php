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
        $user = $this->getUser();

        // If the user is not logged in, redirect to login
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // If the user is not an admin, redirect to login
        if (!in_array('ROLE_ADMIN', $user->getRoles())) {
            return $this->redirectToRoute('app_login');
        }

        // Render the admin dashboard
        return $this->render('admin/dashboard.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
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
