<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public $preserveKeys = true;
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->getKey(),
            'name'  => $this->name,
            'email' => $this->email
        ];
    }

}
