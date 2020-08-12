<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
