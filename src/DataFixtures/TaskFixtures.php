<?php

namespace App\DataFixtures;

use App\Entity\Task;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TaskFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $task = new Task();
         $task->setName('Tâche 1');
         $task->setDescription('Description de la tâche 1');
         $task->setCreatedAt(new DateTimeImmutable('-5 days'));
         $task->setUpdatedAt(new DateTimeImmutable('-5 days'));
         $manager->persist($task);

         $task2 = new Task();
         $task2->setName('Tâche 2');
         $task2->setDescription('Description de la tâche 2');
         $task2->setCreatedAt(new DateTimeImmutable('-10 days'));
         $task2->setUpdatedAt(new DateTimeImmutable('-10 days'));
         $manager->persist($task2);

         $manager->flush();
    }
}
