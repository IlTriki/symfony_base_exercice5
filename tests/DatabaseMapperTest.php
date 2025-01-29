<?php

namespace Tests;

use App\Entity\Database;
use App\Gateway\DatabaseGateway;
use App\Gateway\DatabaseGatewayInterface;
use App\TestExercises\DatabaseMapper;
use PHPUnit\Framework\TestCase;

class DatabaseMapperTest extends TestCase
{
    public function testRealDatabase()
    {
        // Création d'une vraie connexion PDO
        $pdo = new \PDO('mysql:host=127.0.0.1;', 'root', 'r');
        
        // Création du gateway avec la vraie connexion
        $gateway = new DatabaseGateway($pdo);
        
        // Création du mapper
        $mapper = new DatabaseMapper($gateway);
        
        // Appel de la méthode à tester
        $result = $mapper->findAll();
        
        // Vérification que le résultat est un tableau d'objets Database
        $this->assertIsArray($result);
        foreach ($result as $database) {
            $this->assertInstanceOf(Database::class, $database);
        }
    }

    public function testStubDatabase()
    {
        // Création du stub
        $gateway = $this->createStub(DatabaseGatewayInterface::class);
        
        // Configuration du comportement du stub
        $gateway->method('listDbs')
            ->willReturn(['db1', 'db2', 'db3']);
        
        // Création du mapper avec le stub
        $mapper = new DatabaseMapper($gateway);
        
        // Appel de la méthode à tester
        $result = $mapper->findAll();
        
        // Vérifications
        $this->assertCount(3, $result);
        $this->assertInstanceOf(Database::class, $result[0]);
        $this->assertEquals('db1', $result[0]->getName());
    }

    public function testMockDatabase()
    {
        // Création du mock
        $gateway = $this->createMock(DatabaseGatewayInterface::class);
        
        // Configuration des attentes du mock
        $gateway->expects($this->once())
            ->method('listDbs')
            ->willReturn(['test_db1', 'test_db2']);
        
        // Création du mapper avec le mock
        $mapper = new DatabaseMapper($gateway);
        
        // Appel de la méthode à tester
        $result = $mapper->findAll();
        
        // Vérifications
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Database::class, $result[0]);
        $this->assertEquals('test_db1', $result[0]->getName());
    }
}

