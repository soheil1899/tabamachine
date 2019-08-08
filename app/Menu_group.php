<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_group extends Model
{
    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }
    public function submenus()
    {
        return $this->hasMany(Submenu::class)->orderBy('id', 'asc');
    }
}
