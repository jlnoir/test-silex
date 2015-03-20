<?php

namespace TestEmbauche\Repository;

use Doctrine\DBAL\Connection;

class CategoryRepository
{
    protected  $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getAll(){
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('a.*')
            ->from('category', 'a');
        $statement = $queryBuilder->execute();
        $categoryData = $statement->fetchAll();
        return $categoryData;
    }

    public function save($category)
    {
        $categoryData = array(
            'name' => $category->getName()
        );

        if ($category->getId()) {
            $this->db->update('category', $categoryData, array('id' => $category->getId()));

        } else {
            $this->db->insert('category', $categoryData);

            $id = $this->db->lastInsertId();
            $category->setId($id);
        }
    }

    public function delete($id)
    {
        return $this->db->delete('category', array('comment_id' => $id));
    }
}
