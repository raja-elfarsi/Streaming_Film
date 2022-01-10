<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('Admin/base.html.twig');
    }

    /**
     * @Route("/admin/newfilm", name="new")
     */
    public function New(): Response
    {
        return $this->render('Admin/manageFilm/New.html.twig');
    }

    /**
     * @Route("/admin/listfilm", name="list")
     */
    public function List(): Response
    {
        return $this->render('Admin/manageFilm/List.html.twig');
    }

}
