<?php

namespace App\Controller\Skateboards;

use App\Entity\Skateboard\Skateboard;
use App\Service\SkateboardsService;
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
     * @param SkateboardsService $skateboardsService
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        SkateboardsService $skateboardsService
    ) {
        $qb = $skateboardsService->setReturnQuery(false)->getAll();

        return $this->render(
            'skateboard/index.html.twig',
            [
                'items' => $qb,
            ]
        );
    }

    /**
     * @Route("/show/{id}")
     *
     * @param Skateboard $skateboard
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(
        Skateboard $skateboard
    ) {

        return $this->render(
            'skateboard/show.html.twig',
            [
                'item' => $skateboard,
            ]
        );
    }
}