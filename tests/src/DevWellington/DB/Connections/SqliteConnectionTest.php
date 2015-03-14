<?php

namespace DevWellington\DB\Connections;

use \DevWellington\DB\Manager\DbManagerCategory;
use \DevWellington\DB\Entities\EntityCategory;

class SqliteConnectionTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseSqliteConnectionPertenceAInterfaceIConnection()
    {
        $conn = new SqliteConnection();
        $this->assertInstanceOf('\DevWellington\DB\Connections\IConnection', $conn);
    }

    public function testVerificaSeConsegueCriarAClasseSqliteConnection()
    {
        $conn = new SqliteConnection();
        $this->assertInstanceOf('\DevWellington\DB\Connections\SqliteConnection', $conn);
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

        $this->assertFalse( ! $data);
    }

    public function testVerificaSeConsegueInserirEConsultarRegistrosNoBancoDeDados()
    {
        $this->category
            ->setId(1)
            ->setDescription('TV')
        ;

        $this->dbManager->persist($this->category);
        $this->dbManager->flush();

        $data = $this->dbManager->getData();

        $this->assertEquals('TV', $data[0]['description']);
    }

} 
