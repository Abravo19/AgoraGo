<?php

namespace App\Repository;

use App\Entity\LoginTrace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LoginTrace>
 *
 * @method LoginTrace|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginTrace|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginTrace[]    findAll()
 * @method LoginTrace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @method \Doctrine\ORM\QueryBuilder createQueryBuilder(string $alias, string $indexBy = null)
 */
class LoginTraceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoginTrace::class);
    }
    public function findAllOrderedByDateDesc(): array
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.loggedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }




    //    /**
    //     * @return LoginTrace[] Returns an array of LoginTrace objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LoginTrace
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
