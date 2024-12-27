<?php

namespace App\Tests\Mapper;

use App\Gateway\DatabaseGateway;
use App\TestExercises\DatabaseMapper;
use PHPUnit\Framework\TestCase;

class DatabaseMapperTest extends TestCase
{
    public function testRealDatabase(): void
    {
//        $this->expectException(\PDOException::class);

        $pdo = new \PDO('mysql:host=127.0.0.1;dbname=app', 'root', 'root');
        $gateway = new DatabaseGateway($pdo);
        $mapper = new DatabaseMapper($gateway);

        $dbs = $mapper->findAll();

        $this->assertCount(6, $dbs);
    }

    public function testWithSub(): void
    {
        $gateway = $this->createStub(DatabaseGateway::class);
        $gateway->method('listDbs')
            ->willReturn(['app']);

        $mapper = new DatabaseMapper($gateway);

        $dbs = $mapper->findAll();

        $this->assertCount(1, $dbs);
    }

    public function testWithMock(): void
    {
        $gateway = $this->createMock(DatabaseGateway::class);
        $gateway->expects($this->exactly(1))
            ->method('listDbs')
            ->willReturn(['db1', 'db2', 'db3']);

        $mapper = new DatabaseMapper($gateway);

        $dbs = $mapper->findAll();

        $this->assertCount(3, $dbs);
    }
}
