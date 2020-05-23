<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionWithTagResource extends JsonResource
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
            'title' => $this->title,
            'question' => $this->question,
            'tag' => $this->tag(),
            'answers' => AnswerResource::collection($this->answers),
            'views' => $this->views,
            'created_at' => $this->created_at->toIsoString(),
            'user' => $this->user,
        ];
    }
}
