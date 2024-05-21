<?php


namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    
     #[Route('/contact', name: 'contact')]

     
     public function contact(Request $request, MailerInterface $mailer): Response
     {
         $form = $this->createForm(ContactType::class);
         $form->handleRequest($request);

         
     
         if ($form->isSubmitted() && $form->isValid()) {
             $data = $form->getData();

     
             $email = (new Email())
                 ->from($data['email'])
                 ->to('you@example.com')
                 ->subject($data['subject'])
                 ->text($data['message'])
                 ->html(
                    '<p>Nouveau message de ' . $data['full_name'] .' '. $data['subject'] . ' :</p>' .
                    '<p>' . $data['message'] . '</p>'
                );
     
             $mailer->send($email);
     
             return $this->redirectToRoute('contact');
         }
     
         return $this->render('contact/index.html.twig', [
             'form' => $form->createView(),
         ]);
     }
    }