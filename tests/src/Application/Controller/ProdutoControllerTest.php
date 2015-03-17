<?php

namespace Application\Controller;

use DevWellington\DB\Connections\SqliteConnection;
use DevWellington\DB\Entities\EntityCategory;
use DevWellington\DB\Manager\DbManagerCategory;

class ProdutoControllerTest extends \PHPUnit_Framework_TestCase
{

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

        $query = 'INSERT INTO category VALUES (0, "STATUS 0"), (1, "STATUS 1")';
        $this->dbConn->exec($query);

        $this->category = new EntityCategory($this->dbConn);
    }

    public function tearDown()
    {
        $this->dbConn->exec('DROP TABLE category;');
        $this->dbConn = null;
    }

    public function testVerificaSeAClasseProdutoControllerPertenceAInterfaceIController()
    {
        $this->assertInstanceOf(
            '\Application\Controller\IController',
            new ProdutoController(SqliteConnection::getConnection())
        );
    }

    public function testVerificaSeConsegueCriarAClasseProdutoController()
    {
        $this->assertInstanceOf(
            '\Application\Controller\ProdutoController',
            new ProdutoController(SqliteConnection::getConnection())
        );
    }

    public function testVerificaSeOMetodoIndexActionEstaCriandoOForm()
    {
        $ctrl = new ProdutoController($this->dbConn);
        $form = $ctrl->indexAction();

        $this->assertInstanceOf('DevWellington\HTML\Components\Form', $form);
    }


} 