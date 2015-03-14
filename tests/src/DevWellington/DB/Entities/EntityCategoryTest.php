<?php

namespace DevWellington\DB\Entities;

class EntityCategoryTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseEntityCategoryPertenceAInterfaceIEntity()
    {
        $entCategory = new EntityCategory();
        $this->assertInstanceOf('\DevWellington\DB\Entities\IEntity', $entCategory);
    }

    public function testVerificaSeConsegueCriarAClasseFieldSet()
    {
        $entCategory = new EntityCategory();
        $this->assertInstanceOf('\DevWellington\DB\Entities\EntityCategory', $entCategory);
    }

    public function testVerificaSeConsegueSetarEPegarOsDadosDaEntidade()
    {
        $entCategory = new EntityCategory();
        $entCategory
            ->setId(0)
            ->setDescription('teste 0')
        ;

        $this->assertEquals(0, $entCategory->getId());
        $this->assertEquals('teste 0', $entCategory->getDescription());
    }

} 