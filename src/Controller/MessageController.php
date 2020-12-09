<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Message;
use App\Form\MessageType;
use App\Service\GestionContact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function index(): Response
    {
        return $this->render('message/contact.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
    
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, GestionContact $gestionContact): Response{
        $message= new Message();
        
        $form=$this->createForm(MessageType::class,$message);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $message = $form->getData();
            
            $gestionContact->sendEmailWithAttachments($message);
            
        }
        
        $this->addFlash('notification', "votre message a bien été envoyé");
        return $this->render('message/contact.html.twig',[
                    'form' => $form->createView(),
        ]);
    }
    
    
}
