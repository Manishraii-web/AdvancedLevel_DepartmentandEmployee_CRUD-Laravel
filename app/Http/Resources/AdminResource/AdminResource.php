<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            // 'password'=>$this->password   Never expose password hashes in API response. Even hashed passwords should never go to frontend/API.
        ];
    }
}
