<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'comm1_cd', 'comm2_cd', 'comm2_nm'
    ];

    public $timestamps = false;
}
