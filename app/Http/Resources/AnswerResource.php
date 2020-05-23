<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'answer' => $this->answer,
            'question_id' => $this->question_id,
            'user' => $this->user,
            'likes' => $this->likes,
            'created_at' => $this->created_at->toIsoString(),
        ];
    }
}
