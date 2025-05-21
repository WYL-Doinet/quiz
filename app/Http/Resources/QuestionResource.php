<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'question_text' => $this->question_text,
            'user_choice_id' => $this->when($this->user_choice_id ?? false, $this->user_choice_id),
            'choices' => ChoiceResource::collection($this->whenLoaded('choices'))
        ];
    }
}
