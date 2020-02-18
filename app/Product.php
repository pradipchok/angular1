<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'meta_keyword','meta_title','meta_description','parent_id',
    ];

    public function childs()
    {
        return $this->hasMany(Product::class, 'parent_id', 'id');
    }
}
