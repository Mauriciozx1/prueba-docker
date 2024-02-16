<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->getKey(),
            'description' => $this->description,
            $this->mergeWhen($this->users()->first(), fn() =>
            [
                'users' => UserResource::collection($this->users)
            ])
        ];
    }
}
