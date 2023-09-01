<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'content',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title, '-');
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function total_comments()
    {
        return $this->comments()->count();
    }
}
