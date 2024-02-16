<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message,
            $this->mergeWhen($this->user,fn() =>
            [
                'access_token' => $this->user->createToken($this->user->email)->plainTextToken,
                'name'  => $this->user->name,
                'email' => $this->user->email
            ])
        ];
    }
}
