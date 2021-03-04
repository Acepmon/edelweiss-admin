<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'products_variants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id', 
        'variant_value',
        'variant_image',
        'variant_sku',
        'variant_barcode',
        'variant_quantity',
        'variant_price',
    ];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
