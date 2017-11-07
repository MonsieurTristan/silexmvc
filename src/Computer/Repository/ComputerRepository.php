<?php

namespace App\Computer\Repository;

use App\Computer\Entity\Computer;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class ComputerRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

   /**
    * Returns a collection of users.
    *
    * @param int $limit
    *   The number of users to return.
    * @param int $offset
    *   The number of users to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('computer', 'u');

       $statement = $queryBuilder->execute();
       $computersData = $statement->fetchAll();
       foreach ($computersData as $computerData) {
           $computerEntityList[$computerData['id']] = new Computer($computerData['id'], $computerData['modele']);
       }

       return $computerEntityList;
   }

   /**
    * Returns an User object.
    *
    * @param $id
    *   The id of the user to return.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getById($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('computer', 'u')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $computerData = $statement->fetchAll();

       return new Computer($computerData[0]['id'], $computerData[0]['modele']);
   }

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('computer')
          ->where('id = :id')
          ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
    }

    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('computer')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);

        if ($parameters['modele']) {
            $queryBuilder
              ->set('modele', ':modele')
              ->setParameter(':modele', $parameters['modele']);
        }


        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->insert('computer')
          ->values(
              array(
                'modele' => ':modele',
              )
          )
          ->setParameter(':modele', $parameters['modele']);
        $statement = $queryBuilder->execute();
    }
}
