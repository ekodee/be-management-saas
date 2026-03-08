<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->when($request->is('api/projects/*'), $this->description, Str::limit($this->description, 50)),
            'task_count' => $this->tasks_count,
            'status' => 'active',
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}
