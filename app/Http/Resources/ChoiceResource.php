<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChoiceResource extends JsonResource
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
            'choice_text' => $this->choice_text,
            'is_correct' => $this->when($request->routeIs('api.user.quiz.assignment.result'), $this->is_correct),
        ];
    }
}
