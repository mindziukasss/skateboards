<?php

namespace App\Controller\Skateboards;

use App\Entity\Skateboard\Skateboard;
use App\Paginator\PaginatorItemsList;
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
     * @param PaginatorItemsList $paginatorItemsList
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        SkateboardsService $skateboardsService,
        PaginatorItemsList $paginatorItemsList
    ) {
        $qb = $skateboardsService->setReturnQuery(true)->getAll();

        return $this->render(
            'skateboard/index.html.twig',
            [
                'items' => $paginatorItemsList->getPagination($qb),
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