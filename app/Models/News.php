<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
   protected $fillable = ['id', 'id_category', 'title', 'text', 'is_private'];
}
