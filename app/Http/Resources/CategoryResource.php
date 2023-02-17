<?php

namespace App\Http\Resources;

use App\Models\News;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $news = News::where('category_id', $this->id)->where('status', 1)->get();
        return [
            'id' => $this->id,
            'key' => $this->key,
            'name' => $this->name,
            'news' => NewsResource::collection($news),
        ];
    }
}
