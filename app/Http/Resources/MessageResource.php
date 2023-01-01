<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'data' => parent::toArray($request),
            'error' => null
        ];
    }

    public function with($request): array
    {
        return [
            'author' => 'Zubair Idris Aweda',
            'verion' => env('APP_VERSION', '1.0.0'),
            'author_url' => url('https://www.github.com/Zubs')
        ];
    }
}
