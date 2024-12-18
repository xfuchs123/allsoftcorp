<?php

namespace App\Repository;

use App\Entity\Note;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Note>
 */
class NoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);
    }

    public function findAllSorted(): array
    {
        return $this->createQueryBuilder('n')
            ->select(['n.title','n.content'])
            ->orderBy('n.createdAt', 'DESC')
            ->getQuery()->getResult();
    }
}
