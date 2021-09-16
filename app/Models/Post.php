<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // title, slug, short_description, content, meta_description, meta_title, meta_keywords, published, author, editor

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author');

    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor');
    }
}
