<?php

namespace DevWellington\DB\Manager;

use DevWellington\DB\Connections\SqliteConnection;
use DevWellington\DB\Entities\EntityCategory;

class DbManagerCategoryTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeAClasseDbManagerCategoryPertenceAInterfaceIDbManager()
    {
        $this->assertInstanceOf(
            '\DevWellington\DB\Manager\IDbManager',
            new DbManagerCategory($this->dbConn)
        );
    }

    public function testVerificaSeConsegueCriarAClasseDbManagerCategory()
    {
        $this->assertInstanceOf(
            '\DevWellington\DB\Manager\DbManagerCategory',
            new DbManagerCategory($this->dbConn)
        );
    }

    /**
     * @var \PDO
     */
    private $dbConn;

    /**
     * @var EntityCategory
     */
    private $category;

    /**
     * @var DbManagerCategory
     */
    private $dbManager;

    public function setUp()
    {
        $this->dbConn = SqliteConnection::getConnection();
        $this->dbManager = new DbManagerCategory($this->dbConn);


        $query = 'CREATE TABLE category (id INT AUTO_INCREMENT, description VARCHAR(100));';
        $this->dbConn->exec($query);

        $this->category = new EntityCategory($this->dbConn);
    }

    public function tearDown()
    {
        $this->dbConn->exec('DROP TABLE category;');
        $this->dbConn = null;
    }

    public function testVerificaSeConexaoEhDoTipoPDOeSeConsegueRealizarConexao()
    {
        $this->assertInstanceOf('\PDO', $this->dbConn);
    }

    public function testVerificaSeConsegueInserirRegistrosNoBancoDeDados()
    {
        $this->category
            ->setId(1)
            ->setDescription('TV')
        ;

        $this->dbManager->persist($this->category);
        $resultInsert = $this->dbManager->flush();

        $this->assertTrue($resultInsert);

        $data = $this->dbManager->getData();

        $this->assertTrue(is_array($data));
    }

    /**
     * @expectedException Exception
     */
    public function testVerificaSeNaoConsegueInserirRegistrosNoBancoDeDados()
    {
        $fakeEntity = new \stdClass();

//        $this->dbManager->persist($fakeEntity);
        $this->assertFalse($this->dbManager->flush());

        $data = $this->dbManager->getData();

        $this->assertTrue(is_array($data));
    }
}