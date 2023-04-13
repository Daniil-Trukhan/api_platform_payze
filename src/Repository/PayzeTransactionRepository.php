<?php

declare(strict_types=1);

namespace Trukhan\Payze\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Trukhan\Payze\Entity\PayzeTransaction;

/**
 * @method PayzeTransaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method PayzeTransaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method PayzeTransaction[]    findAll()
 * @method PayzeTransaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PayzeTransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PayzeTransaction::class);
    }
}
