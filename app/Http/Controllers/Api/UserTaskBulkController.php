<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserTaskBulkRequest;
use App\Http\Resources\TaskResource;
use App\Models\User;
class UserTaskBulkController extends Controller
{
    public function assignBulk(User $user, UserTaskBulkRequest $request)
    {
        $this->beginTransaction();

        collect($request->input('task_ids'))
            ->map(fn($id) => $user->tasks()->syncWithoutDetaching($id));

        $response = $user->tasks()->paginate(10);

        $this->commit();

        return TaskResource::collection($response);
    }

    public function unassignBulk(User $user, UserTaskBulkRequest $request)
    {
        $this->beginTransaction();

        collect($request->input('task_ids'))
            ->map(fn($id) => $user->tasks()->detach($id));

        $response = $user->tasks()->paginate(10);

        $this->commit();

        return TaskResource::collection($response);
    }
}
