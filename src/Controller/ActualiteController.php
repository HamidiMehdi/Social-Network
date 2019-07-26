<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends Controller
{
    /**
     * @Route("/actualite", name="actualite")
     */
    public function index(Request $request)
    {
        //dump($request->getSession()->get('user')); die;
        return $this->render('actualite/fil_actualite.html.twig', [
        ]);
    }
}
