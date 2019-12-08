<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Collections\ArrayCollection;

class InscreptionController extends AbstractController
{
    /**
     * @Route("/inscreption", name="inscreption")
     */
    public function new(Request $request,  UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        

        
        

        return $this->render('inscreption/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
