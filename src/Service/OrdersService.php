<?php

namespace App\Service;

use App\Entity\Orders\Orders;
use App\Service\Traits\RepositoryResultsTrait;
use Doctrine\ORM\QueryBuilder;

/**
 * Class OrdersService
 */
class OrdersService extends BaseService
{
    use RepositoryResultsTrait;

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Orders::class;
    }

    /**
     * @return QueryBuilder|Orders[]
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAll()
    {
        return $this->getResult($this->repository->createAll());
    }
}