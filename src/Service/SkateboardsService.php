<?php

namespace App\Service;

use App\Entity\Skateboard\Skateboard;
use App\Service\Traits\RepositoryResultsTrait;
use Doctrine\ORM\QueryBuilder;

/**
 * Class SkateboardsService
 */
class SkateboardsService extends BaseService
{
    use RepositoryResultsTrait;

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Skateboard::class;
    }

    /**
     * @return QueryBuilder|Skateboard[]
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAll()
    {
        return $this->getResult($this->repository->createAll());
    }

}