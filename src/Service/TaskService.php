<?php

namespace App\Service;

use App\Entity\Task;
use DateTime;

class TaskService
{
    public function canEditTask(Task $task): bool
    {
        $createdAt = $task->getCreatedAt();
        $now = new DateTime();

        // Vérifier si la tâche a été créée il y a moins de 7 jours
        return $createdAt?->diff($now)->days < 7;
    }
}
