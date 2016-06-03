<?php

namespace qatarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use qatarBundle\Entity\Contact;
use qatarBundle\Form\ContactType;

class ContactController extends Controller
{
    /**
     * Index action
     *
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(new ContactType(), $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $messageBody = $this->renderView('qatarBundle:Email:contact.html.twig', array('contact' => $contact));

            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('send@example.com')
                ->setTo('recipient@example.com')
                ->setBody($messageBody, 'text/html');

            $this->get('mailer')->send($message);

            return $this->render('qatarBundle:Page:contact_confirmation.html.twig');
        }

        return $this->render('qatarBundle:Page:contact.html.twig', array('form' => $form->createView()));
    }
}
