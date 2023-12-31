<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        info($this->title);
        return [
           
            'title' => $this->title,
            'options' => $this->options,
            'weightage' => $this->weightage,
            'status' => $this->status ? "Active" : "Inactive"
        ];
    }
}
