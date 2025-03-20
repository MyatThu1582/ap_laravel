<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostCreated;
class Post extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted(): void
    {
        // static::created(function ($post){
        //     Mail::to('myatthu1582.ygn@gmail.com')->send(new PostCreated($post));
        // });
    }
}
