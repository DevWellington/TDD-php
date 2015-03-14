<?php

namespace DevWellington\DB\Manager;

use DevWellington\DB\Entities\IEntity;

interface IDbManager
{
    public function persist(IEntity $entity);
    public function flush();
    public function getData();
}