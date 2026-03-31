<?php

namespace App\Repository;

use App\Entity\LoginTrace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LoginTrace>
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
    #[Route('/', name: 'app_login_trace_index', methods: ['GET'])]
    public function index(LoginTraceRepository $loginTraceRepository): Response
    {
        return $this->render('login_trace/index.html.twig', [
            'login_traces' => $loginTraceRepository->findAllOrderedByDateDesc(),
        ]);
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
