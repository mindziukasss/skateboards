<?php

namespace App\Repository;

use App\Entity\Skateboard\Skateboard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Skateboard|null find($id, $lockMode = null, $lockVersion = null)
 * @method Skateboard|null findOneBy(array $criteria, array $orderBy = null)
 * @method Skateboard[]    findAll()
 * @method Skateboard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkateboardRepository extends ServiceEntityRepository
{
    /**
     * SkateboardRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Skateboard::class);
    }

    /**
     * @return QueryBuilder
     */
    public function createAll(): QueryBuilder
    {
        $qb = $this->createQueryBuilder('s');

        return $qb;
    }
}