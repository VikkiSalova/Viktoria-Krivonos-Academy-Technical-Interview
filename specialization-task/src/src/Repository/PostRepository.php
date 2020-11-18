<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /** TODO: Implement search of latest post in database */
    public function findLast() {
        $em = $this->getEntityManager();
        $post = $em->createQuery(
            'SELECT p.id
            FROM App\Entity\Post p
            ORDER BY p.id DESC')
            ->setMaxResults(1);
        return $post->getResult();
    }
}
