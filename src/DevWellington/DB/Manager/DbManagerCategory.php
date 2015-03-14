<?php

namespace DevWellington\DB\Manager;

use DevWellington\DB\Entities\EntityCategory;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class DbManagerCategory extends AbstractDbManager
{
    /**
     * @return \PDOStatement
     *
     * todo: Refactory
     *      http://code.tutsplus.com/courses/techniques-for-refactoring-code
     *
     * save ok
     * delete nok
     * update nok
     */
    final public function flush()
    {
        if ( ! is_array($this->entities))
            throw new \InvalidArgumentException("Error FLUSH Entity");

        foreach ($this->entities as $entity) {
            $query = "INSERT INTO category VALUES (:id, :description)";
            $stmt = $this->db->prepare($query);

            $params = array(
                ':id' => $entity->getId(),
                ':description' => $entity->getDescription()
            );

            return $stmt->execute($params);
        }
    }

    /**
     * @return array
     *
     * todo: Refactory
     *      http://code.tutsplus.com/courses/techniques-for-refactoring-code
     */
    final public function getData()
    {
        if ( ! is_array($this->entities))
            throw new \InvalidArgumentException("Error FLUSH Entity");

        foreach ($this->entities as $entity) {
            if ($entity instanceof EntityCategory) {
                $sql = 'SELECT id, description FROM category';
                $rs = $this->db->query($sql);

                return $rs->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
    }
}