<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantOption extends Model
{
    use HasFactory;

    protected $table = 'products_variants_options';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'option_type', 'option_value'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\CommonCode', 'option_type', 'comm2_cd')->whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'C02');
    }
}
