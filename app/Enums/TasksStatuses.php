<?php

namespace App\Enums;

enum TasksStatuses: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case DONE = 'done';
}
