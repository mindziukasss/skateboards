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
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class OrdersController
 *
 * @Route("/order")
 */
class OrdersController extends AbstractController
{
    const MAX_ORDERS_PER_PAGE = 25;

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
                'items' => $paginatorItemsList->getPagination($qb, self::MAX_ORDERS_PER_PAGE),
            ]
        );
    }

    /**
     * @Route("/new/{skateboard}")
     * @param Request             $request
     * @param Skateboard          $skateboard
     * @param OrdersService       $ordersService
     *
     * @param FlashBagInterface   $flashBag
     *
     * @param TranslatorInterface $translator
     *
     * @return Response
     * @throws \Exception
     */
    public function new(
        Request $request,
        Skateboard $skateboard,
        OrdersService $ordersService,
        FlashBagInterface $flashBag,
        TranslatorInterface $translator
    ): Response {
        $order = new Orders();
        $form = $this->createForm(OrdersType::class, $order);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $order->setSkateboard($skateboard);
            $ordersService->create($order);
            $flashBag->add('success', $translator->trans('order.form.thanks_your_order'));
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