<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_keyword extends Model
{

    public function article_group()
    {
        return $this->belongsTo(Article_group::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
