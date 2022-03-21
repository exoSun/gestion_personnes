<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Form\PersonneType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;

class Personnes extends AbstractController
{
    /**
     * @Route("/personnes")
     */
    public function personnes(Request $request, ManagerRegistry $doctrine)
    {
        $personne = new Personne();
        $personne->setNom('');
        $personne->setPrenom('');
        $date = new \DateTime('@' . strtotime('now'));
        $personne->setDateAnniverssaire($date);
        $form = $this->createForm(PersonneType::class, $personne);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();

            $em->persist($personne);
            $em->flush();
        }

        // Retrouver tous les articles
        $sel = $doctrine->getRepository(Personne::class);
        $allPersonnes = $sel->findBy([], ['nom' => 'ASC']);

        return $this->render('personne.html.twig', array(
            'form' => $form->createView(),
            'list_personnes' => $allPersonnes,
        ));
    }
}
