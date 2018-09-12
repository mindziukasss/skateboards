<?php

namespace App\Controller\Skateboards;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SkateboardController
 *
 * @Route("/skateboard")
 */
class SkateboardController extends AbstractController
{
    /**
     * @Route("/list", name="skateboard")
     */
    public function index()
    {
        return $this->render('skateboard/index.html.twig', [
        ]);
    }
}