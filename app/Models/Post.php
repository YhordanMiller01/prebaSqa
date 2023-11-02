<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault('Admin');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault('Musica');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function id() {
        return $this->id;
    }

    public function title() {
        return $this->title;
    }

}
