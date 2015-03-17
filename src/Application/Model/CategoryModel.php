<?php

namespace Application\Model;

class CategoryModel implements IModel
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $dbManager = new \DevWellington\DB\Manager\DbManagerCategory($this->pdo);

        return $dbManager->getData();
    }
} 