<?php

namespace qatarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use qatarBundle\Entity\Reservation;
use qatarBundle\Form\CalendrierType;
use qatarBundle\Form\HorairesType;
use qatarBundle\Form\UserType;
use qatarBundle\Model\Horaires;
use qatarBundle\Model\Tarifs;

class LocationVoitureController extends Controller
{
    public function adresseAction()
    {
        return $this->render('qatarBundle:Page/LocationVoiture:adresse.html.twig');
    }

    public function reservationAction(Request $request)
    {
        $form = $this->createForm(new CalendrierType(), array());
        $form->handleRequest($request);

        $date = $request->request->get('calendrier');

        if ($form->isSubmitted() && !empty($date['date'])) {

            $this->get('session')->set('date', $date['date']);

            return $this->redirect($this->generateUrl('qatar_location_horaires'));
        }

        return $this->render('qatarBundle:Page/LocationVoiture:reservation.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function horairesAction(Request $request)
    {
        $date = \DateTime::createFromFormat('m/d/Y', $this->get('session')->get('date'));
        $type = $date->format('N') >= 6 ? 'weekend' : 'semaine';
        $horaires = Horaires::$horaires[$type];

        $form = $this->createForm(new HorairesType($horaires), array());
        $form->handleRequest($request);

        $horairesChoisis = $request->request->get('horaires');

        if ($form->isSubmitted() && !empty($horairesChoisis['horaires'])) {

            $this->get('session')->set('horaires', $horairesChoisis['horaires']);

            return $this->redirect($this->generateUrl('qatar_location_recapitulatif'));
        }

        return $this->render('qatarBundle:Page/LocationVoiture:horaires.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function recapitulatifAction(Request $request)
    {
        $date = \DateTime::createFromFormat('m/d/Y', $this->get('session')->get('date'));
        $type = $date->format('N') >= 6 ? 'weekend' : 'semaine';
        $horaires = $this->get('session')->get('horaires');
        $nbrHeures = count($horaires) * Horaires::$coeff[$type];
        $tarif = Tarifs::$tarifs[$type][$nbrHeures];

        $reservation = new Reservation();

        $form = $this->createForm(new UserType(), $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $reservation->setDate($date);
            $reservation->setHeures($horaires);
            $reservation->setNbrHeures($nbrHeures);
            $reservation->setTarif($tarif);

            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            $this->get('session')->set('qatar_resa_id', $reservation->getId());


            return $this->redirect($this->generateUrl('qatar_location_confirmation'));
        }

        return $this->render('qatarBundle:Page/LocationVoiture:recapitulatif.html.twig', array(
            'form'      => $form->createView(),
            'date'      => $date,
            'nbrHeures' => $nbrHeures,
            'horaires'  => $horaires,
            'tarif'     => $tarif
        ));
    }

    public function paiementAction()
    {
        return $this->render('qatarBundle:Page/LocationVoiture:paiement.html.twig');
    }

    public function confirmationAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository('qatarBundle:Reservation')
                     ->find($this->get('session')->get('qatar_resa_id', null));

        if ($data) {
            $messageBody = $this->renderView('qatarBundle:Email:location_voiture_confirmation.html.twig', array(
                'data' => $data
            ));

            $message = \Swift_Message::newInstance()
                ->setSubject('Réservation - ' . $data->getDate()->format('d-m-Y') . strtoupper($data->getNom()))
                ->setFrom('pointcontrole@gmail.com','QatarCar')
                ->setTo('pointcontrole@gmail.com','QatarCar')
                ->setBody($messageBody, 'text/html');

            $this->get('mailer')->send($message);



            return $this->render('qatarBundle:Page/LocationVoiture:confirmation.html.twig');
        }
    }
}
