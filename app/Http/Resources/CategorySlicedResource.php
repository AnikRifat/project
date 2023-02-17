<?php

namespace App\Http\Resources;

use App\Models\News;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorySlicedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $news = News::where('category_id', $this->id)->where('status', 1)->take(10)->get();
        return [
            'id' => $this->id,
            'key' => $this->key,
            'name' => $this->name,
            'news' => NewsResource::collection($news),
        ];
    }
}
