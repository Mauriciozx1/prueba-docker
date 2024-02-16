<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $response = $user->tasks()->paginate(10);

        return TaskResource::collection($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Task $task)
    {
        $response = $task;

        return new TaskResource($response);
    }
}
