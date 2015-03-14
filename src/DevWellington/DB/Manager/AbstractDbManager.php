<?php

namespace DevWellington\DB\Manager;

use DevWellington\DB\Entities\IEntity;

abstract class AbstractDbManager implements IDbManager
{
    /**
     * @var \PDO
     */
    protected $db;

    /**
     * @var IEntity
     */
    protected $entities;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param IEntity $entity
     */
    public function persist(IEntity $entity)
    {
        $this->entities[] = $entity;
    }

    abstract public function flush();
    abstract public function getData();
}