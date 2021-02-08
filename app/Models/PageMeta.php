<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageMeta extends Model
{
    use HasFactory;

    protected $table = 'pages_meta';
    public $timestamps = false;
}
