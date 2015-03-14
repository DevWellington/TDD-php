<?php

namespace DevWellington\DB\Entities;

class EntityCategory implements IEntity {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id integer
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

}