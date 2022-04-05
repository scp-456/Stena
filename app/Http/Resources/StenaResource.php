<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StenaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'theme' => $this->theme,
            'text' => $this->text,
            'updated_at' => $this->updated_at,
        ];
    }
}
