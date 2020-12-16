<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AisShipTypeRepository;
use App\Entity\AisShipType;

class AisShipTypeController extends AbstractController
{
    /**
     * @Route("/aisshiptype", name="aisshiptype")
     */
    public function index(): Response
    {
        return $this->render('aisshiptype/index.html.twig', [
            'controller_name' => 'AisShipTypeController',
        ]);
    }
    
    /**
     * @Route("/voirtous", name="voirtous")
     */
    public function voirTous(AisShipTypeRepository $repo)
    {
       $types=$repo->findAll();
        return $this->render('aisshiptype/voirtous.html.twig', [
                    'types' => $types,
        ]);
    }
    
    /**
     * @Route("/portcompatibles/{id}", name="ports")
     */
    public function portsCompatibles(AisShipTypeRepository $repo,$id)
    {
       $port=$repo->find($id);
        return $this->render('aisshiptype/voirtous.html.twig', [
                    'port' => $ports,
        ]);
    }
    
    
}
