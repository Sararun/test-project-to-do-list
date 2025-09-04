<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function create(TaskRequest $request)
    {
        $taskResource = new TaskResource(Task::create($request->validated()));
        return \response($taskResource, Response::HTTP_CREATED);
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response(status: Response::HTTP_NO_CONTENT);
    }
}
