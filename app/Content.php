<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title', 'description', 'meta_keyword','meta_title','meta_description',
    ];
}
