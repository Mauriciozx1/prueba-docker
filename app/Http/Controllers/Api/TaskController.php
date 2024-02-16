<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Task::paginate(10);

        return TaskResource::collection($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $this->beginTransaction();

        $response = Task::create($request->all());

        $this->commit();

        return new TaskResource($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $response = $task;

        return new TaskResource($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $this->beginTransaction();

        $task->update($request->all());

        $this->commit();

        return $this->show($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->beginTransaction();

        $task->delete();

        $this->commit();

        return response()->noContent();
    }
}
