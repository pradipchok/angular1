<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
   protected $fillable = [
        'title', 'description','short_description', 'meta_keyword','meta_title','meta_description','status',
    ];
}
