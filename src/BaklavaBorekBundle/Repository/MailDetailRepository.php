<?php

namespace BaklavaBorekBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MailDetailRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MailDetailRepository extends EntityRepository
{
    public function get_Hunter(){
        return $this->createQueryBuilder("hunter")
            ->select(array("hunter", "u.id", "u.name", "u.surname"))
            ->innerJoin("BaklavaBorekBundle\Entity\user", "u")
            ->addSelect("COUNT(hunter.mailSentBy) as kac_tane")
            ->where("u.id = hunter.mailSentBy")
            ->groupBy("hunter.mailSentBy")
            ->orderBy("kac_tane", "DESC")
            ->getQuery()
            ->getResult();
    }
}
