<?php

namespace App\Tests\ControllerTest;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    public function testTaskListIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/tasks');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('body', 'Liste des Tâches');
    }

    public function testTaskListIsAccessibleWithMock(): void
    {
        $client = static::createClient();

        $taskRepository = $this->createMock(TaskRepository::class);
        $taskRepository->expects($this->once())
            ->method('findAll')
            ->willReturn([
                (new Task())
                    ->setId(1)
                    ->setName('Tâche 1')
                    ->setDescription('Description de la tâche 1')
            ]);

        $client->getContainer()->set(TaskRepository::class, $taskRepository);

        $client->request('GET', '/tasks');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('body', 'Liste des Tâches');
    }

    public function testTaskShowIsAccessibleWithMock(): void
    {
        $client = static::createClient();

        $taskRepository = $this->createMock(TaskRepository::class);
        $taskRepository->expects($this->once())
            ->method('find')
            ->with(1)
            ->willReturn(
                (new Task())
                    ->setId(1)
                    ->setName('Tâche 1')
                    ->setDescription('Description de la tâche 1')
            );

        $client->getContainer()->set(TaskRepository::class, $taskRepository);

        $client->request('GET', 'task/1');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('body', 'Tâche 1');
    }
}
