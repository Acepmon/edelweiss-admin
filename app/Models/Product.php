<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function product_status()
    {
        return $this->belongsTo('App\Models\CommonCode', 'product_status_cd', 'comm2_cd')->whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'C01');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection', 'collections_products');
    }

    public function seo()
    {
        return $this->hasOne('App\Models\ProductSeo');
    }

    public function options()
    {
        return $this->hasMany('App\Models\ProductVariantOption');
    }

    public function variants()
    {
        return $this->hasMany('App\Models\ProductVariant');
    }

    public function medias()
    {
        return $this->hasMany('App\Models\ProductMedia');
    }

    public function getThumbnailAttribute()
    {
        if ($this->medias()->count() > 0) {
            return $this->medias()->first()->url;
        }

        return url(asset('static/images/flowers/0.jpeg'));
    }

    public function fbt()
    {
        return $this->belongsToMany(Product::class, 'products_fbt', 'product_id', 'fbt_product_id');
    }
}
