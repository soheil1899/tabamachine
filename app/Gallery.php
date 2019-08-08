<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $fillable = [
        'product_id', 'article_id', 'image', 'slider'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
