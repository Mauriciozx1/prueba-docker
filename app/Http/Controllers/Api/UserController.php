<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = User::paginate(10);

        return UserResource::collection($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $response = $user;

        return new UserResource($response);
    }
}
