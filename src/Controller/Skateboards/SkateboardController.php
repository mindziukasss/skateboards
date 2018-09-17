<?php

namespace App\Controller\Skateboards;

use App\Entity\Skateboard\Skateboard;
use App\Form\Skateboard\SkateboardFilterType;
use App\Paginator\PaginatorItemsList;
use App\Service\SkateboardsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request            $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        SkateboardsService $skateboardsService,
        PaginatorItemsList $paginatorItemsList,
        Request $request
    ) {

        $form = $this->createForm(SkateboardFilterType::class);
        $form->handleRequest($request);
        $filters = $form->getData();
        $qb = $skateboardsService->setReturnQuery(true)->getAllFiltered($filters);

        return $this->render(
            'skateboard/index.html.twig',
            [
                'items' => $paginatorItemsList->getPagination($qb),
                'form' => $form->createView(),
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

        return new JsonResponse(
            [
                'template' => $this->renderView(
                    'skateboard/show.html.twig',
                    [
                        'item' => $skateboard,
                    ]
                ),
            ]
        );
    }
}