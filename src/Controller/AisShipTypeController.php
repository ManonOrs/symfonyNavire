<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AisShipTypeRepository;
use App\Entity\AisShipType;
use App\Repository\PortRepository;

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
     * @Route("/portscompatibles/{id}", name="ports")
     */
    public function portsCompatibles(AisShipTypeRepository $repo,$id)
    {
       $type=$repo->find($id);
       $ports=$type->getLesPorts();
        return $this->render('aisshiptype/portscompatibles.html.twig', [
                    'type' => $type,
                    'ports' =>$ports,
        ]);
    }
    
    
}
