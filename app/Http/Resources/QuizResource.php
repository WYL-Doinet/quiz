<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'questions' =>  QuestionResource::collection($this->whenLoaded('questions')),
            'questions_count' => $this->when($this->questions_count ?? false, $this->questions_count),
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
