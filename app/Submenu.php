<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    public function menu()
    {
        return $this->belongsTo(Menu_group::class);
    }
}
