<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo('App\Models\CommonCode', 'role_cd', 'comm2_cd')->whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'A01');
    }
}
