<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    // protected $keyType = 'string';
    protected $connection = 'mysql_admin';
    // public $timestamps = true;
    // public $incrementing = false;

    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function shipping()
    {
        return $this->hasOne(OrderShipping::class, 'order_id');
    }

    public function billing()
    {
        return $this->hasOne(OrderBilling::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function order_status()
    {
        return $this->belongsTo('App\Models\CommonCode', 'order_status_cd', 'comm2_cd')->whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'D01');
    }

    public function payment_status()
    {
        return $this->belongsTo('App\Models\CommonCode', 'payment_status_cd', 'comm2_cd')->whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'D02');
    }

    public function fulfillment_status()
    {
        return $this->belongsTo('App\Models\CommonCode', 'fulfillment_status_cd', 'comm2_cd')->whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'D03');
    }
}
