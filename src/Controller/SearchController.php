<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\NavireRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function searchBar()
    {
        $form = $this->createFormBuilder()
                ->setAction($this->generateUrl("search_handlesearch"))
                ->add('cherche', TextType::class)
                ->add('envoiimo', SubmitType::class)
                ->add('envoimmsi', SubmitType::class)
                ->getForm()
        ;
        
        return $this->render('search/search.html.twig', [
                    'formSearch' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/search/handleshearch", name="search_handlesearch")
     */
    public function handleSearch(Request $request, NavireRepository $repo): Response {
        $valeur = $request->request->get('form')['chercher'];
        if (isset($request->request->get('form')['envoiimo'])) {
            
            $critere = "imo recherché : " . $valeure;
        }else{
            
            $critere = "mmi recherché : " . $valeur;
        }
            return new Response("<h1> $critere </h1>");
    }
}
