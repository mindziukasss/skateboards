<?php

namespace App\Controller\Orders;

use App\Entity\Orders\Orders;
use App\Entity\Skateboard\Skateboard;
use App\Form\Orders\OrdersType;
use App\Paginator\PaginatorItemsList;
use App\Service\OrdersService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class OrdersController
 *
 * @Route("/order")
 */
class OrdersController extends AbstractController
{
    /**
     * @Route("/list")
     * @param OrdersService      $ordersService
     *
     * @param PaginatorItemsList $paginatorItemsList
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        OrdersService $ordersService,
        PaginatorItemsList $paginatorItemsList
    ) {

        $qb = $ordersService->setReturnQuery(true)->getAll();

        return $this->render(
            'orders/index.html.twig',
            [
                'items' => $paginatorItemsList->getPagination($qb),
            ]
        );
    }

    /**
     * @Route("/new/{skateboard}")
     * @param Request       $request
     * @param Skateboard    $skateboard
     * @param OrdersService $ordersService
     *
     * @return Response
     * @throws \Exception
     */
    public function new(
        Request $request,
        Skateboard $skateboard,
        OrdersService $ordersService
    ): Response {
        $order = new Orders();
        $form = $this->createForm(OrdersType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order->setSkateboard($skateboard);
            $ordersService->create($order);

            return $this->redirectToRoute('skateboard');
        }

        return $this->render(
            'orders/new.html.twig',
            [
                'item' => $skateboard,
                'order' => $order,
                'form' => $form->createView(),
            ]
        );
    }
}