<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\TaskRepository;
use App\Entity\Task;
class TaskControllerTest extends WebTestCase
{
    public function testTaskShowIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/tasks');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Liste des Tâches');
    }

    public function testTaskListIsAccessibleWithMock(): void
    {
        $client = static::createClient();
        
        $taskRepositoryMock = $this->createMock(TaskRepository::class);
        $taskRepositoryMock->expects($this->once())
            ->method('findAll')
            ->willReturn([]);
        
        $client->getContainer()->set(TaskRepository::class, $taskRepositoryMock);
        
        $client->request('GET', '/tasks');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Liste des Tâches');
    }

    public function testTaskShowIsAccessibleWithMock(): void
    {
        $client = static::createClient();

        $taskRepositoryMock = $this->createMock(TaskRepository::class);
    }
}
