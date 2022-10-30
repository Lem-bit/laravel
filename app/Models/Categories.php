<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    protected $fillable = [ 'id', 'title', 'text', 'slug' ];
}
