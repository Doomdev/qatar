<?php

namespace qatarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use qatarBundle\Entity\Contacts;
use qatarBundle\Form\ContactsType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('qatarBundle:Page:home.html.twig');
    }

    public function serviceAction()
    {
        return $this->render('qatarBundle:Page:service.html.twig');
    }

    public function presentationAction()
    {
        return $this->render('qatarBundle:Page:presentation.html.twig');
    }

    public function scgAction()
    {
        return $this->render('qatarBundle:Page:scg.html.twig');
    }

    public function assutempoAction()
    {
        return $this->render('qatarBundle:Page:assutempo.html.twig');
    }

    public function certifAction()
    {
        return $this->render('qatarBundle:Page:certif.html.twig');
    }

    public function declarationAction()
    {
        return $this->render('qatarBundle:Page:declaration.html.twig');
    }

    public function decladesessionAction()
    {
        return $this->render('qatarBundle:Page:decladesession.html.twig');
    }

    public function plaqueAction()
    {
        return $this->render('qatarBundle:Page:plaque.html.twig');
    }

    public function tarificationAction()
    {
        return $this->render('qatarBundle:Page:tarification.html.twig');
    }

    public function ctaAction()
    {
        return $this->render('qatarBundle:Page:cta.html.twig');
    }

    public function achatetventeAction()
    {
        return $this->render('qatarBundle:Page:achatetvente.html.twig');
    }

    public function carosserieAction()
    {
        return $this->render('qatarBundle:Page:carosserie.html.twig');
    }

    public function cartegriseAction()
    {
        return $this->render('qatarBundle:Page:carte_grise.html.twig');
    }
}
