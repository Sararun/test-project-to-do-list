<?php

namespace App\Enums;

enum TasksStatuses: string
{
    case TODO = 'todo';
    case STARTED = 'started';
    case DONE = 'done';
}
