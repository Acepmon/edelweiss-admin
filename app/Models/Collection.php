<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function seo()
    {
        return $this->hasOne('App\Models\CollectionSeo');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'collections_products');
    }
}
