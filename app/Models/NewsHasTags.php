<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsHasTags extends Model
{
    use HasFactory;

    protected $table = 'news_has_tags';

    protected $fillable = [
        'news_id',
        'tag_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
