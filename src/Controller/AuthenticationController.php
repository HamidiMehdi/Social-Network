<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionFormType;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticationController extends Controller
{
    /**
     * @Route("/", name="authentication")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function authentification(Request $request)
    {
        $form = $this->getFormAuthentification();
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            /** @var UserService $userService */
            $userService = $this->get(UserService::REFERENCE);
            $user = $userService->findUserForAuth(
                $form->getData()['username'],
                hash('sha512', $form->getData()['password'])
            );

            if ($user !== null) {
                return $this->redirectToRoute('actualite');
            }
            $form->addError(new FormError("Nom d'utilisateur ou mot de passe incorrect"));
        }

        return $this->render('authentication/authentication.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/inscription", name="inscription")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function inscription(Request $request)
    {
        $user = new User();
        $form = $this->createForm(InscriptionFormType::class, $user);
        $form->add('submit', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();


            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('actualite');
        }

        return $this->render('authentication/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }

    private function getFormAuthentification()
    {
        $form = $this->createFormBuilder([])
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        return $form;
    }
}
